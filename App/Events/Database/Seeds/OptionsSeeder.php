<?php namespace App\Events\Database\Seeds;

use Illuminate\Database\Seeder;
use Melisa\Laravel\Database\InstallOption;

class OptionsSeeder extends Seeder
{
    use InstallOption;
    
    public function run()
    {
        
        $this->installOption('option.lamina.access', [
            'name'=>'Option main de aplicación laimina',
            'text'=>'Events',
            'isSubMenu'=>true
        ]);
        
    }
    
}
