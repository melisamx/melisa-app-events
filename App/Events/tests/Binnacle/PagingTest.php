<?php namespace App\Events\tests\Binnacle;

use App\Events\tests\TestCase;
use Melisa\Laravel\Database\InstallUser;

class PagingTest extends TestCase
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
        ->json('get', 'binnacle', [
            'page'=>1,
            'start'=>0,
            'limit'=>25,
        ])
        ->seeJson([
            'success'=>true,
        ])
        ->seeJsonStructure([
            'data'=>[
                '*'=>[
                    'id', 'event', 'eventDescription'
                ]
            ],
            'total'
        ]);
        
    }
    
}
