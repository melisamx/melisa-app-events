<?php namespace App\Events\Logics\Binnacle;

use Melisa\core\LogicBusiness;
use App\Core\Repositories\BinnacleRepository;
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
    
    public function __construct(
        BinnacleRepository $binnacle,
        ListenersRepository $listeners
    ) {
        
        $this->binnacle = $binnacle;
        $this->listeners = $listeners;
        
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
        
        $idsBel = $this->createBinnacleListeners($listeners);
        exit(dd($idsBel));
        if( !$idsBel) {
            
            return $this->binnacle->rollback();
            
        }       
        
        exit(dd('list'));
        
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
    
    public function updateBinnacle($idBinnacle, $indicted = true) {
        
        return $this->binnacle->update([
            'idBinnacleStatus'=>$indicted ? 
                BinnacleRepository::INDICTED : BinnacleRepository::PROCESSING,
            'isIndicted'=>true,
            'indictedAt'=>date('Y-m-d H:i:s')
        ], $idBinnacle);
        
    }
    
    public function createBinnacleListeners(&$listeners) {
        exit(dd($listeners));
        return $this->binnacleListeners->creates($listeners);
        
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
