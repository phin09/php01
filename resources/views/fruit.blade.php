@if ($itemCount = count($items))
    <p>{{$itemCount}} 종류의 과일이 있습니다.</p>
@else
    <p>아무것도 없습니다.</p>
@endif

{{--foreach 사용--}}
<ul>
    @foreach($items as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>

{{--for 사용--}}
<ul>
    @for($i = 0; $i < count($items); $i++)
        <li>{{ $items[$i] }}</li>
    @endfor
</ul>

{{--while 사용--}}
@php($i = -1)
<ul>
    @while(++$i < count($items))
        <li>{{ $items[$i] }}</li>
    @endwhile
</ul>

{{--아래는 blade에서 유효하지 않음--}}
<ul>
    $i = 0;
    @while($i < count($items))
        <li>{{ $items[$i] }}</li>
        $i++;
    @endwhile
</ul>

{{--아래는 empty 분기로 빠지기 위한 라인--}}
<?php $items = []; ?>
{{--forelse 사용 - php에 없는 if와 foreach의 결합--}}
<ul>
    @forelse($items as $item)
        <li>{{ $item }}</li>
    @empty
        <li>없습니다.</li>
    @endforelse
</ul>