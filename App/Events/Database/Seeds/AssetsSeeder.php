<?php namespace App\Events\Database\Seeds;

use Illuminate\Database\Seeder;
use Melisa\Laravel\Database\FirstOrCreate;

class AssetsSeeder extends Seeder
{    
    use FirstOrCreate;
    
    public function run()
    {
        
        $this->firstOrCreate('App\Core\Models\Assets', [
            [
                'find'=>[
                    'id'=>'app.lamina.phone.programaciones.view',
                ],
                'values'=>[
                    'idAssetType'=>2,
                    'name'=>'CSS Ver Programaciones versión phone',
                    'path'=>'/lamina/css/programaciones-phone.css',
                ]
            ],
        ]);
        
    }
    
}
