<?php 

Route::group([
    'prefix'=>'v1',
    'middleware'=>'auth.basic',
    'namespace' =>'v1'
], function() {
    
    Route::post('binnacle/process', 'BinnacleController@process');
    Route::post('binnacle/listeners/process', 'BinnacleListenersController@process');
    
});
