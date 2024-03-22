<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            report details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900">report details of report #{{$report->id}}</h3>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                @foreach ($report as $key => $node)
                                    <div class="px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-8 text-gray-900">{{ $key }}</dt>
                                        <dd class="mt-2 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $node }}</dd>
                                    </div>
                                @endforeach
                        </div>



                        <div>
                            <h2>other reports on this date:</h2>
                            @foreach ($related as $relatedReport)
                                <a href="{{ route('report.view', ['id' => $relatedReport->id]) }}">
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


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
