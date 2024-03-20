<h1>Uploaded files</h1>

<table>
    <tr>
        <th>type</th>
        <th>description</th>
        <th>created</th>
        <th>updated</th>
        <th>Filename</th>
        <th>Uploaded at</th>
        <th>Download</th>
    </tr>
    @forelse($uploadedFiles as $uploadedFile)
        <tr>
            <td>
                {{$uploadedFile->type}}
            </td>
            <td>
                {{$uploadedFile->description}}
            </td>
            <td>
                {{$uploadedFile->created_at}}
            </td>
            <td>
                {{$uploadedFile->upadted_at}}
            </td>
            <td>
                {{ $uploadedFile->original_name }}
            </td>
            <td>
                {{ $uploadedFile->created_at }}
            </td>
            <td>
                <a href="{{ \Illuminate\Support\Facades\Storage::url($uploadedFile->file_path) }}" download>
                    download
                </a>
            </td>
        </tr>
        {{-- {{dump($uploadedFile)}} --}}
    @empty
        <tr>
            <td>No uploads found</td>
        </tr>
    @endforelse
</table>
<a href="{{ route('uploads.create') }}">
    Upload a file
</a>