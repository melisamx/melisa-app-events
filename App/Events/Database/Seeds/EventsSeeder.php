<?php namespace App\Events\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

class EventsSeeder extends InstallSeeder
{
    
    public function run()
    {
                
        $this->installEvent('event.*', [
            'description'=>'All events'
        ]);
        
    }
    
}
