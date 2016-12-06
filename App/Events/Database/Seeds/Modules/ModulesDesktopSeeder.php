<?php namespace App\Events\Database\Seeds\Modules;

use Illuminate\Database\Seeder;

class ModulesDesktopSeeder extends Seeder
{
    
    public function run()
    {
        
        $this->call(Desktop\ProgramacionesViewSeeder::class);
        $this->call(Desktop\TarjasViewSeeder::class);
        $this->call(Desktop\TarjasAddSeeder::class);
        
    }
    
}
