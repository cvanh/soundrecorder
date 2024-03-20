<x-header/>
<h1>Uploaded files</h1>
<a href="{{url('uploads/export')}}"">export</a>

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
                <a href="{{ route('uploads.view',['id' => $uploadedFile->id]) }}">
                   view 
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td>No uploads found</td>
        </tr>
    @endforelse
</table>