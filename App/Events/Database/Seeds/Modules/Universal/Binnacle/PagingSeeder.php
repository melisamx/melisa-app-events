<?php namespace App\Events\Database\Seeds\Modules\Universal\Binnacle;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Paginar lista de eventos en bitacora',
                'url'=>'/events.php/binnacle/',
                'description'=>'Módulo para paginar lista de eventos en bitacora',
                'task'=>[
                    'key'=>'task.events.binnacle.paging',
                    'name'=>'Paginar lista de eventos en bitacora',
                    'description'=>'Permitir paginar lista de eventos en bitacora',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
