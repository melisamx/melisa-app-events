<?php namespace App\Events\Database\Seeds;

use Illuminate\Database\Seeder;
use Melisa\Laravel\Database\InstallApplication;

class ApplicationSeeder extends Seeder
{    
    use InstallApplication;
    
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
