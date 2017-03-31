<?php namespace App\Events\Logics\Binnacle;

use Melisa\core\LogicBusiness;
use App\Core\Repositories\BinnacleRepository;
use App\Core\Repositories\BinnacleListenersRepository;
use App\Core\Repositories\ListenersRepository;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ProcessLogic
{
    use LogicBusiness;
    
    protected $binnacle;
    protected $listeners;
    protected $binnacleListeners;
    
    public function __construct(
        BinnacleRepository $binnacle,
        ListenersRepository $listeners,
        BinnacleListenersRepository $binnacleListeners
    ) {
        
        $this->binnacle = $binnacle;
        $this->listeners = $listeners;
        $this->binnacleListeners = $binnacleListeners;
        
    }
    
    public function init(array $input) {
        
        $this->debug('Init logic process binnacle {b}', [
            'b'=>$input['idBinnacle']
        ]);
        
        $this->binnacle->beginTransaction();
        
        $binnacle = $this->getBinnacle($input['idBinnacle']);
        
        if( !$binnacle) {
            
            return $this->binnacle->rollback();
            
        }
        
        if( !$this->isValidBinnacle($binnacle)) {
            
            return $this->binnacle->rollback();
            
        }
        
        $listeners = $this->getListeners($binnacle->idEvent);
        
        if( $listeners === false) {
            
            $this->binnacle->rollback();
            return $this->error('Imposible get listeners from event {e}', [
                'e'=>$binnacle->idEvent
            ]);
            
        }
        
        if( !count($listeners)) {
            
            return $this->processNoListeners($binnacle);
            
        }
        
        $idsBl = $this->createBinnacleListeners($input['idBinnacle'], $listeners);
        
        if( !$idsBl) {
            
            return $this->binnacle->rollback();
            
        }
        
        if( !$this->updateBinnacle($input['idBinnacle'], true)) {
            
            return $this->binnacle->rollback();
            
        }
        
        if( !$this->publishBinnacleListeners($idsBl)) {
            
            return $this->binnacle->rollback();
            
        }
        
        $this->binnacle->commit();
        return $idsBl;
        
    }
    
    public function publishBinnacleListeners($idsBel) {
        
        $appUrl = config('app.url');
        
        if( !melisa('string')->endsWith($appUrl, '/')) {
            
            $appUrl .= '/';
            
        }
        
        foreach($idsBel as $idBel) {
            
            \Redis::publish('new.job', json_encode([
                'urlRun'=>$appUrl . 'events.php/api/v1/binnacle/listeners/process',
                'dateRun'=>time() * 1000,
                'postData'=>[
                    'idBinnacleListener'=>$idBel,
                ],
            ]));
            
        }
        
        return true;
        
    }
    
    public function processNoListeners(&$binnacle) {
        
        $this->debug('no exist listeners on event {e}', [
            'e'=>$binnacle->idEvent
        ]);
        
        $result = $this->updateBinnacle($binnacle->id);
        
        if( !$result) {
            
            return $this->error('Imposible update binnacle record {i}', [
                'i'=>$binnacle->id
            ]);
            
        }
        
        $this->binnacle->commit();
        return true;        
        
    }
    
    public function updateBinnacle($idBinnacle, $processed = true) {
        
        return $this->binnacle->update([
            'idBinnacleStatus'=>$processed ? 
                BinnacleRepository::INDICTED : BinnacleRepository::PROCESSING,
            'isProcessed'=>$processed,
            'processedAt'=>$processed ? date('Y-m-d H:i:s') : null
        ], $idBinnacle);
        
    }
    
    public function createBinnacleListeners($idBinnacle, &$listeners) {
        
        $flag = true;
        $idsListeners = [];
        $idIdentity = $this->getIdentity();
        
        foreach($listeners as $listener) {
            
            $idListener = $this->binnacleListeners->create([
                'idIdentityCreated'=>$idIdentity,
                'idBinnacleListenerStatus'=>BinnacleListenersRepository::NEW_RECORD,
                'idBinnacle'=>$idBinnacle,
                'idListener'=>$listener->id,
            ]);
            
            if( !$idListener) {
                
                $flag = false;
                break;
                
            }
            
            $idsListeners []= $idListener;
            
        }
        
        if( !$flag) {
            
            return false;
            
        }
        
        return $idsListeners;
        
    }
    
    public function getListeners($idEvent) {
        
        $this->debug('get listeners of event {e}', [
            'e'=>$idEvent,
        ]);
        
        return $this->listeners->findAllBy('idEvent', $idEvent);
        
    }
    
    public function isValidBinnacle(&$binnacle) {
        
        if( $binnacle->idBinnacleStatus === BinnacleRepository::NEW_RECORD) {
            
            return true;
            
        }
        
        $this->debug('record binnacle is indicted {e}', [
            'b'=>$binnacle->id
        ]);
        
        return $this->error('intent process record binnacle {b}', [
            'b'=>$binnacle->id
        ]);
        
    }
    
    public function getBinnacle($id) {
        
        return $this->binnacle->findOrFail($id);
        
    }
    
}
