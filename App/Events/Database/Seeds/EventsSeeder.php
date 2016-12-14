<?php namespace App\Events\Database\Seeds;

use Illuminate\Database\Seeder;
use Melisa\Laravel\Database\InstallEvent;

class EventsSeeder extends Seeder
{
    use InstallEvent;
    
    public function run()
    {
                
        $this->installEvent('event.*', [
            'description'=>'All events'
        ]);
        
    }
    
}
