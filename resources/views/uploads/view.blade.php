<x-header/>
<h1>report #{{$report->id}} info:</h1>
@foreach ($report as $key => $node)
    <li>{{ $key }}: {{ $node }}</li>
@endforeach

<div>
    <h2>other reports on this date:</h2>
@foreach ($related as $relatedReport)
    <div>
        {{$relatedReport->type}}
    </div>    
@endforeach
</div>