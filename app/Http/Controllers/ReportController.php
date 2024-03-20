<?php

namespace App\Http\Controllers;

use App\Jobs\ExportReport;
use App\Models\Report;
use App\Models\User;
use DateTime;
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
        // fetch the report the user wants to view
        $report = DB::table('Report')->where('id', $id)->first();

        // fetch reports on the same day but exclude the current record that is viewed
        // but first we need the date of when the record was made
        $reportDate = DateTime::createFromFormat("Y-m-d H:i:s", $report->created_at)->format("Y-m-d");

        // now we know the date whe can fetch other records that where made on this date
        $relatedReports = Report::whereDate('created_at', $reportDate)
            ->where('id', '!=', $id)
            ->get();
        return view('uploads.view', ['report' => $report, 'related' => $relatedReports]);
    }

    // requests export
    public function export()
    {
        dispatch(new ExportReport());
        return redirect()->route('index')->with('success', "export started");
    }
}