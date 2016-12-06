<?php namespace App\Events\Database\Seeds\Modules\Desktop;

use Illuminate\Database\Seeder;

class TarjasAddSeeder extends Seeder
{
    
    public function run()
    {
        
        app('App\Core\Logics\Modules\Install')->init([
            [
                'name'=>'Agregar tarjas',
                'url'=>'/lamina.php/modules/tarjas/add',
                'description'=>'Módulo interfaz para agregar tarjas',
                'nameSpace'=>'Melisa.lamina.view.desktop.tarjas.AddWrapper',
                'task'=>[
                    'key'=>'task.lamina.tarjas.add.access',
                    'name'=>'Acceso a agregar tarjas de lamina',
                    'description'=>'Permitir acceso a agregar tarjas de lamina',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.lamina.tarjas.add.access',
                    'name'=>'Opción para agregar tarjas de lamina',
                    'text'=>'Agregar tarjas'
                ]
            ],
        ]);
        
    }
    
}
