<x-header/>
<h1 class="title">Upload file</h1>
@if ($errors->any())
<div class="notification is-danger is-light">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form id="uploadForm" action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file_upload">file</label>
    <input type="file" name="file_upload">

<br>

    <label for="type">type</label>
    <select name="type" form="uploadForm">
        <option value="vibration">vibration</option>
        <option value="sound">sound</option>
        <option value="manual">manual</option>
    </select>

    <br>

    <textarea name="description" placeholder="whats wrong?"></textarea>

    <br>

    <button type="submit">submit</button>
</form>