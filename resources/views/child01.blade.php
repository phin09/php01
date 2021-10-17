@extends('layouts.parent')

@section('style')
    <style>
        body {background: green; color: white;}
    </style>
@stop

@section('content')
    <p>child 뷰의 'content' 섹션입니다.</p>
@endsection {{--또는 @stop--}}