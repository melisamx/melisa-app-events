<?php namespace App\Events\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Events\Http\Requests\BinnacleListenerProcessRequest as Request;
use App\Events\Logics\Binnacle\Listeners\ProcessLogic;

class BinnacleListenersController extends Controller
{
    
    public function process(Request $request, ProcessLogic $logic)
    {
        
        $output = $logic->init($request->allValid());
        
        return response()->create($output);
        
    }
    
}
