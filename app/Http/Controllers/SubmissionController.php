<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SubmissionController extends Controller
{


    public function index()
    {
        $submissions = Submission::latest()->get();
        return view('submissions.index', compact('submissions'));
    }

    public function create()
    {
        $items = Item::all(); // Assuming you have an Item model
        return view('submissions.create',compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'submission_number' => 'required|unique:submissions,submission_number',
            'submission_date' => 'required|date',
        ]);

        Submission::create([
            'id' => (string) Str::uuid(),
            'submission_number' => strtoupper($request->submission_number),
            'submission_date' => Carbon::parse($request->submission_date)->format('Y-m-d'),
        ]);

        return redirect()->route('submissions.index')->with('success', 'Submission created successfully.');
    }

    public function show(Submission $submission)
    {
        return view('submissions.show', compact('submission'));
    }

    public function edit(Submission $submission)
    {
        return view('submissions.edit', compact('submission'));
    }

    public function update(Request $request, Submission $submission)
    {
        $request->validate([
            'submission_number' => 'required|unique:submissions,submission_number,' . $submission->id,
            'submission_date' => 'required|date',
        ]);

        $submission->update([
            'submission_number' => strtoupper($request->submission_number),
            'submission_date' => Carbon::parse($request->submission_date)->format('Y-m-d'),
        ]);

        return redirect()->route('submissions.index')->with('success', 'Submission updated successfully.');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submissions.index')->with('success', 'Submission deleted.');
    }

    public function approve(Submission $submission)
{
    $submission->update([
        'status' => 'approved',
        'processed_by' => auth()->id(),
        'processed_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Submission approved successfully.');
}

public function reject(Submission $submission)
{
    $submission->update([
        'status' => 'rejected',
        'processed_by' => auth()->id(),
        'processed_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Submission rejected.');
}
}
