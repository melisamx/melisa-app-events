<?php namespace App\Events\Database\Seeds\Modules;

use Illuminate\Database\Seeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesUniversalSeeder extends Seeder
{
    
    public function run()
    {        
        $this->binnacle();        
    }
    
    public function binnacle()
    {
        $this->call(Universal\Binnacle\PagingSeeder::class);
    }
    
}
