@extends('layouts.parent')

@section('style')
    <style>
        body {background: green; color: white;}
    </style>
@stop

@section('content')
    <p>child 뷰의 'content' 섹션입니다.</p>
    @include('partials.footer')
@endsection {{--또는 @stop--}}

{{--이름이 겹치는 section을 테스트해보았지만 child 뷰의 내용과 조각뷰의 내용 둘다 뜨지 않음--}}
{{--@parent도 소용없이 둘다 뜨지 않음--}}
{{--@section('script')--}}
{{--    <script>--}}
{{--        alert("child 뷰의 script 섹션입니다.")--}}
{{--    </script>--}}
{{--@endsection--}}