<?php namespace App\Events\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Core\Models\User;

class UsersSeeder extends Seeder
{
    
    public function run()
    {
                
        User::updateOrCreate([
            'id'=>'4662eda3-bb33-11e6-b565-080027cc70da'
        ], [
            'name'=>'scheduleJobsService',
            'password'=>bcrypt('sWeld#s02'),
            'email'=>'robot.schedule@melisa.mx',
            'isGod'=>false
        ]);
        
    }
    
}
