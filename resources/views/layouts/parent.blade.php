<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>라라벨 입문</title>
</head>
<body>
    @section('test')
{{--        @stop이 없을 경우 아래 라인도 출력됩니다.--}}
        <p>parent 뷰의 'test' 섹션입니다.</p>
    @stop

    @yield('style')

    @yield('content') <!-- 삽입할 섹션 이름은 부모자식간 약속입니다.-->
<!--        실제 삽입되는 child 뷰의 내용은 아래 라인보다 위 입니다.-->
        <p>child 뷰의 내용이 삽입될 위치입니다.</p>
</body>
</html>