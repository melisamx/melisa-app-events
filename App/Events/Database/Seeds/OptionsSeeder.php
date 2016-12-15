<?php namespace App\Events\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

class OptionsSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installOption('option.events.access', [
            'name'=>'Option main de aplicación events',
            'text'=>'Events',
            'isSubMenu'=>true
        ]);
        
    }
    
}
