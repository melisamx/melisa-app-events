<?php namespace App\Events\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use Melisa\Laravel\Logics\PagingLogics;

use App\Events\Http\Requests\Binnacle\PagingRequest;

use App\Core\Repositories\BinnacleRepository;
use App\Events\Criteria\Binnacle\WithFiltersCriteria;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BinnacleController extends Controller
{
    
    public function paging(PagingRequest $request, BinnacleRepository $repository, WithFiltersCriteria $criteria)
    {
        
        $logic = new PagingLogics($repository, $criteria);
        
        return $logic->init($request->allValid());
        
    }
    
}
