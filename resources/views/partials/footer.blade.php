<!--다른 뷰에서 이 뷰를 가져가 사용합니다.-->
{{--@include('가져갈 조각뷰 이름')를 이용--}}
<footer>
    <p>꼬리말</p>
</footer>

{{--이름이 겹치는 section을 테스트해보았지만 child 뷰의 내용과 조각뷰의 내용 둘다 뜨지 않음--}}
{{--@section('script')--}}
{{--    @parent--}}
{{--    <script>--}}
{{--        alert("조각뷰의 script 섹션입니다.")--}}
{{--    </script>--}}
{{--@endsection--}}