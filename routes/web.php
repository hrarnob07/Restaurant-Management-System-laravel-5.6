<?php





Auth::routes();

Route::get('/','HomeController@index')->name('welcome');
Route::post('/reservation_add','ReservationController@reservation');
Route::post('/contact','ContractController@index');
Route::get('admin/contact_show','ContractController@contact_show');


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){

    Route::get('dashboard', 'DashbordController@dashbord')->name('admin.dashboard');
    Route::resource('show_slider','SliderController');
    #___________________category_________________________
    Route::get('category_show','CategoryController@index');
    Route::get('category_create','CategoryController@create');
    Route::post('add_category','CategoryController@store');
    Route::get('category_edit/{id}','CategoryController@edit');
    Route::get('category_edit/{id}','CategoryController@edit');
    Route::post('category_update/{id}','CategoryController@update');
    Route::get('category_delete/{id}','CategoryController@destroy');

    #---------------------------item-------------------------------------
    Route::get('item_show','ItemController@index');
    Route::get('add_item','ItemController@create');
    Route::post('save_item','ItemController@store');
    Route::get('edit_item/{id}','ItemController@edit');
    Route::post('item_update/{id}','ItemController@update');
    Route::get('item_delete/{id}','ItemController@destroy');
    #-----------reservation----- admin
    Route::get('reservation','ReservationControllerAdmin@index');
    Route::post('active/{id}','ReservationControllerAdmin@status');
    Route::get('delete/{id}','ReservationControllerAdmin@destory');

    #--------contact------------------------
    
    


});