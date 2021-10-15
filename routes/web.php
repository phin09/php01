<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/a/{test?}', function ($test='default') {
    return $test;
});

// 아래 같이 하면 test를 안넣었을 때 page not found
Route::get('/{test?}/b', function ($test='default') {
    return $test;
});

Route::get('/home1', [
    'as' => 'home1', // 라우트 이름
    function () {
        return 'Home!';
    }
]);
Route::get('/home2', function () {
    return redirect(route('home1')); // home1으로 이동. url도 /home1으로 바뀜.
});