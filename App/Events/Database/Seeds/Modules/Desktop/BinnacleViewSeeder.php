<?php namespace App\Events\Database\Seeds\Modules\Desktop;

use Melisa\Laravel\Database\InstallSeeder;

class BinnacleViewSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Ver bitacora de eventos',
                'url'=>'/events.php/modules/binnacle/view/',
                'description'=>'Módulo interfaz de usuario para ver bitacora de eventos',
                'nameSpace'=>'Melisa.events.view.desktop.binnacle.view.Wrapper',
                'task'=>[
                    'key'=>'task.events.binnacle.view.access',
                    'name'=>'Acceso a ver bitacora de eventos',
                    'description'=>'Permitir acceso a ver bitacora de eventos',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.events.binnacle.view.access',
                    'name'=>'Opción para ver bitacora de eventos',
                    'iconClassSmall'=>'x-fa fa fa-bolt',
                    'iconClassMedium'=>'x-fa fa fa-bolt',
                    'iconClassLarge'=>'x-fa fa fa-bolt',
                    'text'=>'Bitacora de eventos'
                ],
                'event'=>[
                    'key'=>'event.events.binnacle.view.access',
                    'description'=>'Se accedió al módulo para ver bitacora de eventos'
                ],
            ],
        ]);
        
        $this->installAssetCss('asset.events.binnacle.view', [
            'name'=>'CSS view binnacle events',
            'path'=>'/events/css/binnacle.css',
            'version'=>'1.0.0',
        ]);
        
    }
    
}
