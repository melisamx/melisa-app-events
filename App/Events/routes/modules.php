<?php 

Route::group([
    'prefix'=>'binnacle',
], function() {
    
    require realpath(base_path() . '/routes/modules/binnacle.php');
    
});
