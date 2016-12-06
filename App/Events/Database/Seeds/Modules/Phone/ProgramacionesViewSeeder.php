<?php namespace App\Events\Database\Seeds\Modules\Phone;

use Illuminate\Database\Seeder;

class ProgramacionesViewSeeder extends Seeder
{
    
    public function run()
    {
        
        app('App\Core\Logics\Modules\Install')->init([
            [
                'name'=>'Ver programaciones',
                'url'=>'/lamina.php/modules/programaciones/viewPhone',
                'description'=>'Módulo interfaz para ver programaciones versión phone',
                'nameSpace'=>'Melisa.lamina.view.phone.programaciones.ViewWrapper',
                'task'=>[
                    'key'=>'task.lamina.phone.programaciones.view.access',
                    'name'=>'Acceso a ver programaciones de lamina versión phone',
                    'description'=>'Permitir acceso a ver programaciones de lamina en versión phone',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.lamina.phone.programaciones.view.access',
                    'name'=>'Opción para ver programaciones de lamina en versión phone',
                    'text'=>'Programaciones'
                ],
                'menu'=>[
                    [
                        'key'=>'menu.lamina.phone.programaciones.view.access',
                        'name'=>'Menú crud de programaciones de lamina en versión phone',
                        'options'=>[
                            'option.lamina.phone.programaciones.add.access',
                            'option.lamina.phone.programaciones.rollos.update.access',
                        ]
                    ]
                ]
            ],
        ]);
        
    }
    
}
