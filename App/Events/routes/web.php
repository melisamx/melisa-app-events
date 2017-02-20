<?php 

Route::group([
    'prefix'=>'modules',
    'namespace'=>'Modules'
], function() {
    
    require realpath(base_path() . '/routes/modules.php');
    
});

Route::group([
    'prefix'=>'binnacle',
], function() {
    
    require realpath(base_path() . '/routes/modules/binnacle.php');
    
});
