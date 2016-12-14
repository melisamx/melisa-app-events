<?php namespace App\Events\Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
                
        $this->call(ApplicationSeeder::class);
        $this->call(OptionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(EventsSeeder::class);
//        $this->call(AssetsSeeder::class);
        
    }
    
}
