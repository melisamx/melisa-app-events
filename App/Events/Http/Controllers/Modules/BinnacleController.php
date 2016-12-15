<?php namespace App\Events\Http\Controllers\Modules;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Events\Modules\Binnacle\ViewModule;

class BinnacleController extends Controller
{
    
    public function view(ViewModule $module)
    {
        
        return $module->render();
        
    }
    
}
