<?php namespace App\Events\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 * 
 * @author Luis Josafat Heredia Contreras
 */
class IdentitiesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installIdentity('Schedule Jobs Service', 'system', 'scheduleJobsService', [
            'display'=>'Schedule Jobs Service',
            'active'=>true,
            'isDefault'=>true,
            'isSystem'=>true
        ]);
        
    }
    
}
