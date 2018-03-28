<?php

namespace App\Events\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Events\Http\Requests\BinnacleProcessRequest;
use App\Events\Logics\Binnacle\ProcessLogic;

class BinnacleController extends Controller
{
    
    public function process(
        BinnacleProcessRequest $request, 
        ProcessLogic $logic
    )
    {        
        $output = $logic->init($request->allValid());        
        return response()->create($output);        
    }
    
}
