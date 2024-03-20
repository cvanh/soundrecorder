<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ url('uploads/export') }}">export</a>

                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>type</th>
                                <th>description</th>
                                <th>created</th>
                                <th>updated</th>
                                <th>Filename</th>
                                <th>Uploaded at</th>
                                <th>detail page link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($uploadedFiles as $uploadedFile)
                                <tr>
                                    <td>
                                        {{ $uploadedFile->type }}
                                    </td>
                                    <td>
                                        {{ $uploadedFile->description }}
                                    </td>
                                    <td>
                                        {{ $uploadedFile->created_at }}
                                    </td>
                                    <td>
                                        {{ $uploadedFile->upadted_at }}
                                    </td>
                                    <td>
                                        {{ $uploadedFile->original_name }}
                                    </td>
                                    <td>
                                        {{ $uploadedFile->created_at }}
                                    </td>
                                    <td>
                                        <a href="{{ route('report.view', ['id' => $uploadedFile->id]) }}">
                                            details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
