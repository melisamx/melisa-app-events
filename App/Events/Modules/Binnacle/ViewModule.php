<?php namespace App\Events\Modules\Binnacle;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public $event = 'event.events.binnacle.view.access';
    
    public function dataDictionary() {
        
        return [
            'success'=>true,
            'assets'=>[
                $this->asset('asset.events.binnacle.view')
            ],
            'data'=>[
                'wrapper'=>[
                    'title'=>'Bitacora de eventos'
                ],
                'modules'=>[
                    'events'=>$this->module('task.events.binnacle.paging'),
                    'listeners'=>$this->module('task.events.binnacle.listeners.paging'),
                ],
            ]
        ];
        
    }
    
}
