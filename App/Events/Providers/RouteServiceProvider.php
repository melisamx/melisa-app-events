<?php namespace App\Events\Providers;

use Melisa\Laravel\Providers\RouteServiceProvider as RouteService;

class RouteServiceProvider extends RouteService
{
    
    public $namespace = 'App\Events\Http\Controllers';
    
        
}
