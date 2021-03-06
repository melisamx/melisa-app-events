<?php namespace App\Events\Database\Seeds\Modules;

use Illuminate\Database\Seeder;

class ModulesPhoneSeeder extends Seeder
{
    
    public function run()
    {
        
        $this->call(Phone\ProgramacionesViewSeeder::class);
        $this->call(Phone\TarjasAddSeeder::class);
        
    }
    
}
