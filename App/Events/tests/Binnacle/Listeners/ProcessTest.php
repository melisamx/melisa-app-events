<?php namespace App\Events\tests\Binnacle\Listeners;

use App\Events\tests\TestCase;
use Melisa\Laravel\Database\InstallUser;

class ProcessTest extends TestCase
{
    use InstallUser;
    
    /**
     * @test
     * @group completed
     */
    public function simple()
    {
        
        $user = $this->findUser();
        
        $this->actingAs($user)
        ->json('post', 'api/v1/binnacle/', [
            'id'=>'',
        ])
        ->dump();
        
    }
    
}
