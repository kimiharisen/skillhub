<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Store a new enrollment (register participant to a course).
     */
    public function store(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $courseId = $validated['course_id'];

        // Attach course to participant, avoid duplicates
        $participant->courses()->syncWithoutDetaching([
            $courseId => ['enrolled_at' => now()],
        ]);

        return redirect()
            ->route('participants.show', $participant)
            ->with('success', 'Participant enrolled to course successfully.');
    }

    /**
     * Remove an enrollment (unregister participant from a course).
     */
    public function destroy(Participant $participant, Course $course)
    {
        $participant->courses()->detach($course->id);

        return redirect()
            ->route('participants.show', $participant)
            ->with('success', 'Participant unenrolled from course successfully.');
    }
}
