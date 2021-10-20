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

// 라우트 목록을 확인하는 커맨드
// php artisan route:list


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

Route::get('/fruit', function () {
    $items = ['apple', 'banana', 'tomato'];
    return view('fruit', ['items' => $items]);
});

Route::get('/template', function () {
    return view('child01');
});

// 라우트의 처리 로직을 WelcomeController의 index method에 위임
Route::get('/', 'WelcomeController@index');

// --resource 옵션을 준 커맨드로 만들어서 기본 제공되는 uri와 컨트롤러 method가 있다. 라우트 목록에서 확인 가능.
// 리소스를 나타내는 url 경로는 복수형을 권장.
// 컨트롤러 이름은 복수형을 사용하는 게 관례.
Route::resource('articles', 'ArticlesController');

// 사용자 인증
// 사용자 인증을 아래처럼 구현하는 대신 php artisan make:auth 커맨드로 라라벨 내장 사용자 인증을 사용할 수 있다.
// 이 때 .env에서 MAIL_DRIVER=log로 변경한 다음 storage/logs/laravel.log 파일에서 비밀번호 변경 메일을 보고 비밀번호를 수정할 수 있다.

// 라우트만으로 구현한 사용자 인증
Route::get('auth/login', function () {
    $credentials = [
        'email' => 'john@example.com',
        'password' => 'password'
    ];

    // 아래 두 if 조건문은 같은 기능임
    // if (! auth()->attempt($credentials)) { // auth 도우미 사용
    if (! Auth::attempt($credentials)) { // Auth facade 사용
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

Route::get('protected', ['middleware' => 'auth', function () {
    // 크롬 개발자도구 source 탭에서 login_web_random#를 볼 수 있다. 로그인했을 때만 존재한다.
    // 로그인한 사용자에 해당하는 기본 키 값이 담겨있다.
    dump(session()->all());

    // middleware를 적용하지 않았을 때 필요한, 로그인하지 않은 사용자가 가는 분기
//    if(! auth()->check()) {
//        return '누구세요?';
//    }

    // 로그인하지 않았을 때 auth()->user()는 null
    return '어서오세요 ' . auth()->user()->name;
}]);

Route::get('auth/logout', function () {
    auth()->logout();

    return '또 봐요';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


