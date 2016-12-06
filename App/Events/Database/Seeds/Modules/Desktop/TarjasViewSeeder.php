<?php namespace App\Events\Database\Seeds\Modules\Desktop;

use Illuminate\Database\Seeder;

class TarjasViewSeeder extends Seeder
{
    
    public function run()
    {
        
        app('App\Core\Logics\Modules\Install')->init([
            [
                'name'=>'Ver tarjas',
                'url'=>'/lamina.php/modules/tarjas/view',
                'description'=>'Módulo interfaz para ver tarjas',
                'nameSpace'=>'Melisa.lamina.view.desktop.tarjas.ViewWrapper',
                'task'=>[
                    'key'=>'task.lamina.tarjas.view.access',
                    'name'=>'Acceso a ver tarjas de lamina',
                    'description'=>'Permitir acceso a ver tarjas de lamina',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.lamina.tarjas.view.access',
                    'name'=>'Opción para ver tarjas de lamina',
                    'text'=>'Tarjas'
                ],
                'menu'=>[
                    [
                        'key'=>'menu.lamina.tarjas.view.access',
                        'name'=>'Menú crud de tarjas de lamina',
                        'options'=>[
                            'option.lamina.tarjas.add.access',
                            'option.lamina.tarjas.update.access',
                            'option.lamina.tarjas.remove.access',
                        ]
                    ]
                ]
            ],
        ]);
        
    }
    
}
