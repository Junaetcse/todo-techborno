<?php

Auth::routes();
Route::get('/', function () {
    return view('site.login');
});

Route::group(['middleware' => ['auth']], function () {
    //
Route::get('/site_dashboard', function () {
    return view('site.dashboard');
});


// For list 
Route::get('/site','ListsController@admin_dashboard');
Route::post('/listCreate','ListsController@store');
Route::post('/edit/{id}','ListsController@update');
Route::post('list/sequence','ListsController@list_sortable');
Route::delete('/delete/ticket/{id}','ListsController@destroy');



//For task
Route::get('/allTasks','TasksController@allTasks');
Route::post('/createTask/{id}','TasksController@store');
Route::get('/editTask/{id}','TasksController@edit');
Route::post('/update/{id}','TasksController@update');
Route::get('/delete-task/{id}','TasksController@destroy');


Route::get('/showList/{list_id}','TasksController@tasks_details');

Route::get('/profile','UserController@profile');
Route::post('/update_user/{id}','UserController@update');


});
