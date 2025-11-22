<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Course;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all participants with pagination
        $participants = Participant::orderBy('created_at', 'desc')->paginate(10);

        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Basic validation
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone' => 'nullable|string|max:50',
        ]);

        Participant::create($validated);

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        // Load related courses
        $participant->load('courses');

        // Courses that this participant is NOT enrolled in yet (for dropdown)
        $availableCourses = Course::whereDoesntHave('participants', function ($query) use ($participant) {
                $query->where('participants.id', $participant->id);
            })
            ->orderBy('title')
            ->get();

        return view('participants.show', compact('participant', 'availableCourses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $participant->id,
            'phone' => 'nullable|string|max:50',
        ]);

        $participant->update($validated);

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant deleted successfully.');
    }
}