<?php



Auth::routes();

Route::get('/logout-manual',function(){
    return request()->session()->invalidate(false);
});
Route::get('/{any}', 'AppController@index')->where('any','.*');

