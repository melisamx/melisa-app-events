<?php namespace App\Events\Database\Seeds\Modules\Phone;

use Illuminate\Database\Seeder;
use Melisa\Laravel\Database\FirstOrCreate;

class TarjasAddSeeder extends Seeder
{
    use FirstOrCreate;
    
    public function run()
    {
        
        app('App\Core\Logics\Modules\Install')->init([
            [
                'name'=>'Agregar Tarjas',
                'url'=>'/lamina.php/modules/tarjas/addPhone',
                'description'=>'Módulo interfaz para agregar tarjas versión phone',
                'nameSpace'=>'Melisa.lamina.view.phone.tarjas.AddWrapper',
                'task'=>[
                    'key'=>'task.lamina.phone.tarjas.add.access',
                    'name'=>'Acceso a agregar tarjas de lamina versión phone',
                    'description'=>'Permitir acceso a agregar tarjas de lamina en versión phone',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.lamina.phone.tarjas.add.access',
                    'name'=>'Opción para agregar tarjas de lamina en versión phone',
                    'text'=>'Agregar tarjas'
                ]
            ],
        ]);
        
        $this->firstOrCreate('App\Core\Models\Assets', [
            [
                'find'=>[
                    'id'=>'app.lamina.phone.tarjas.add',
                ],
                'values'=>[
                    'idAssetType'=>2,
                    'name'=>'CSS Agregar tarjas versión phone',
                    'path'=>'/lamina/css/tarjas-phone.css',
                ]
            ],
        ]);
        
    }
    
}
