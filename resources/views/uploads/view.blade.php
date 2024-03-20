<x-header />
<h1>report #{{ $report->id }} info:</h1>
@foreach ($report as $key => $node)
    <li>{{ $key }}: {{ $node }}</li>
@endforeach

<div>
    <h2>other reports on this date:</h2>
    @foreach ($related as $relatedReport)
        <a href="{{ route('uploads.view', ['id' => $relatedReport->id]) }}">
            <div style="height: 100px; overflow:hidden; border: 1px solid black;">
                <div>
                    #{{ $relatedReport->id }}
                </div>
                <div>
                    type: {{ $relatedReport->type }}
                </div>
                <div>
                    time: {{ $relatedReport->created_at }}
                </div>
            </div>
        </a>
    @endforeach
</div>
