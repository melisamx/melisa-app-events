<?php namespace App\Events\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installApplication('events', [
            'name'=>'Events',
            'description'=>'Application Events',
            'nameSpace'=>'Melisa.events',
            'typeSecurity'=>'art'
        ]);
        
    }
    
}
