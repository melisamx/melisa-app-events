<?php namespace App\Events\Database\Seeds\Modules\Desktop;

use Illuminate\Database\Seeder;

class ProgramacionesViewSeeder extends Seeder
{
    
    public function run()
    {
        
        app('App\Core\Logics\Modules\Install')->init([
            [
                'name'=>'Ver programaciones',
                'url'=>'/lamina.php/modules/programaciones/view',
                'description'=>'Módulo interfaz para ver programaciones',
                'nameSpace'=>'Melisa.lamina.view.desktop.programaciones.ViewWrapper',
                'task'=>[
                    'key'=>'task.lamina.programaciones.view.access',
                    'name'=>'Acceso a ver programaciones de lamina',
                    'description'=>'Permitir acceso a ver programaciones de lamina',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.lamina.programaciones.view.access',
                    'name'=>'Opción para ver programaciones de lamina',
                    'text'=>'Programaciones'
                ],
                'menu'=>[
                    [
                        'key'=>'menu.lamina.programaciones.view.access',
                        'name'=>'Menú crud de programaciones de lamina',
                        'options'=>[
                            'option.lamina.programaciones.add.access',
                            'option.lamina.programaciones.rollos.update.access',
                        ]
                    ]
                ]
            ],
        ]);
        
    }
    
}
