<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // stores the upload
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming file. Refuses anything bigger than 2048 kilobyes (=2MB)
        $request->validate([
            'file_upload' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file_upload');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('reportFile', 'public');

        // Store file information in the database
        $uploadedFile = new Report();
        $uploadedFile->filename = $fileName;
        $uploadedFile->original_name = $file->getClientOriginalName();
        $uploadedFile->file_path = $filePath;
        $uploadedFile->type = "sound";
        $uploadedFile->save();

        // Redirect back to the index page with a success message
        return redirect()->route('index')
            ->with('success', "File `{$uploadedFile->original_name}` uploaded successfully.");
    }

    // shows the create form
    public function create()
    {
        return view('uploads.create');
    }

    // shows the uploads index
    public function index()
    {
        $uploadedFiles = Report::all();
        return view('index', compact('uploadedFiles'));
    }

    // shows an detail page of an upload
    public function detail(int $id)
    {
        $report = DB::table('Report')->find($id);
        return view('uploads.view', ['report' => $report]);
    }
}