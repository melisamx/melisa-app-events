<?php namespace App\Events\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

class UsersSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installUser('scheduleJobsService', 'sWeld#s02', [
            'email'=>'robot.schedule@melisa.mx',
            'isGod'=>false
        ]);
        
    }
    
}
