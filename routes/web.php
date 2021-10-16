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

// route override - 같은 url을 여러번 정의하면 마지막이 먼저것들을 덮어씀
Route::get('/', function () {
    return view('errors.503'); // 하위 디렉터리는 . 또는 / 으로 참조 가능.
});

// view 함수에 아무 인자도 넘기지 않으면 뷰 인스턴스를 얻을 수 있다.
// 데이터 바인딩 방법 1-1
Route::get('/', function () {
    return view('hello') -> with('name', 'Foo');
});
// 데이터 바인딩 방법 1-2 (배열)
Route::get('/', function () {
    return view('hello') -> with([
        'name' => 'user1',
        'greeting' => '안녕하세요',
    ]);
});
// 데이터 바인딩 방법 2
// 아래처럼 view의 두번째 인자로 넘기는 게 더 많이 쓰이는 방식.
Route::get('/', function () {
    return view('hello', [
        'name' => 'user2',
        'greeting' => '안녕하세요?',
    ]);
});