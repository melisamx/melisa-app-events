<?php namespace App\Events\Logics\Binnacle\Listeners;

use Melisa\core\LogicBusiness;
use App\Core\Repositories\BinnacleRepository;
use App\Core\Repositories\BinnacleListenersRepository;
use App\Core\Repositories\BinnacleListenersErrorsRepository;
use App\Core\Repositories\ListenersRepository;
use App\Core\Logics\Modules\Run;

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
    protected $binnacleListenersErrors;
    protected $run;
    
    public function __construct(
        BinnacleRepository $binnacle,
        ListenersRepository $listeners,
        BinnacleListenersRepository $binnacleListeners,
        BinnacleListenersErrorsRepository $binnacleListenersErrors,
        Run $run
    ) {
        
        $this->binnacle = $binnacle;
        $this->listeners = $listeners;
        $this->binnacleListeners = $binnacleListeners;
        $this->binnacleListenersErrors = $binnacleListenersErrors;
        $this->run = $run;
        
    }
    
    public function init(array $input) {
        
        $this->debug('Init logic process binnacle listener {b}', [
            'b'=>$input['idBinnacleListener']
        ]);
        
        $this->binnacleListeners->beginTransaction();
        
        $binnacleListener = $this->binnacleListeners->findOrFail($input['idBinnacleListener']);
        
        if( !$binnacleListener) {
            
            return $this->binnacleListeners->rollback();
            
        }
        
        $binnacle = $binnacleListener->binnacle;
        
        if( !$binnacle) {
            
            return $this->binnacleListeners->rollback();
            
        }
        
        $event = $binnacle->event;
        
        if( !$event) {
            
            return $this->binnacleListeners->rollback();
            
        }
        
        $listener = $binnacleListener->listener;
        
        if( !$listener) {
            
            return $this->binnacleListeners->rollback();
            
        }
        
        if( !$this->isValidBinnacleListener($binnacleListener)) {
            
            return $this->binnacleListeners->rollback();
            
        }
        
        if( !$this->updateBinnacleListener($binnacleListener->id)) {
            exit(dd('err'));
            return $this->binnacleListeners->rollback();
            
        }        
        
        $this->binnacleListeners->commit();
        $this->binnacleListeners->beginTransaction();
        
        $result = $this->run->init($listener->idModule, $binnacle->data);
        $estatus = 'processed';
        
        if( !$result) {
            
            if( !$this->registerError($binnacleListener->id)) {
                
                $this->binnacleListeners->rollback();
                return $this->error('Imposible register error run module in binnacle listener {b}', [
                    'b'=>$binnacleListener->id
                ]);
                
            }
            
            $estatus = 'processedErrors';
            
        }
        
        if( !$this->updateBinnacleListener($binnacleListener->id, $estatus)) {
            
            return $this->binnacleListeners->rollback();
            
        }
        
        $this->binnacleListeners->commit();
        return true;
        
    }
    
    public function registerError($idBinnacleListener) {
        
        $id = $this->binnacleListenersErrors->create([
            'idBinnacleListener'=>$idBinnacleListener,
            'error'=>$this->run->getError()
        ]);
        
        if (!$id) {
            
            return false;
            
        }
        
        return $id;
        
    }
    
    public function updateBinnacleListener($idBinnacleListener, $estatus = 'new') {
        
        return $this->binnacleListeners->update([
            'idBinnacleListenerStatus'=>$this->binnacleListeners->getStatus($estatus),
        ], $idBinnacleListener);
        
    }
    
    public function isValidBinnacleListener(&$binnacleListener) {
        
        if( $binnacleListener->idBinnacleListenerStatus === $this->binnacleListeners->getStatus('new')) {
            
            return true;
            
        }
        
        return $this->error('intent process record binnacle listener {b} is not new status', [
            'b'=>$binnacleListener->id
        ]);
        
    }
    
}
