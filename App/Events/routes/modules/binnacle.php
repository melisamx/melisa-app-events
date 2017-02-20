<?php 

Route::get('view', 'BinnacleController@view')->middleware('gate:task.events.binnacle.view.access');
Route::get('/', 'BinnacleController@paging')->middleware('gate:task.events.binnacle.paging');
