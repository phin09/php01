{{--blade 문법을 사용하지 않았을 때--}}
{{--주석처리 했으니 아랫줄이 나오면 안되는데 {{ 부터도 다 출력됨...--}}
{{--<h1><?= isset($greeting) ? "{$greeting} " : 'Hello'; ?><?= $name; ?></h1>--}}

{{--blade 문법 string interpolation 사용--}}
<h1>{{ $greeting or 'Hello' }} {{ $name or ''}}</h1>
{{--blade 내의 자바스크립트에서 string interpolation은 @{{ }}--}}
{{--특수문자를 escape하지 않은채로 문자열을 뷰에 포함하려면 {{!! $var !!}}--}}

{{--이 blade 주석은 소스보기에서 안보이지만--}}
<!--이 html 주석은 소스보기에서 보임-->