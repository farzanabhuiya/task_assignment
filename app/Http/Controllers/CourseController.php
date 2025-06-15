<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // Show the form
    public function create()
    {
        return view('courses.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'category' => 'nullable|string',
        'modules' => 'required|array',
        'modules.*.title' => 'required|string',
        'modules.*.contents' => 'nullable|array',
        'modules.*.contents.*.title' => 'required|string',
        'modules.*.contents.*.video_link' => 'nullable|string',
        'modules.*.contents.*.image' => 'nullable|image|max:2048',
    ]);

    $course = Course::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
    ]);

    foreach ($request->modules as $mIndex => $mod) {
        $module = $course->modules()->create([
            'title' => $mod['title'],
        ]);

        if (!empty($mod['contents'])) {
            foreach ($mod['contents'] as $cIndex => $cont) {
                $imagePath = null;
                if ($request->hasFile("modules.$mIndex.contents.$cIndex.image")) {
                    $imagePath = $request->file("modules.$mIndex.contents.$cIndex.image")
                                         ->store('course_images', 'public');
                }

                $module->contents()->create([
                    'title' => $cont['title'],
                    'video_link' => $cont['video_link'] ?? null,
                    'image' => $imagePath,
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Course created successfully!');
}


    /**
     * Optional: Show list of courses
     */
    public function index()
    {
        $courses = Course::with('modules.contents')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Optional: Show single course details
     */
    // public function show($id)
    // {
    //     $course = course::with('modules.contents')->findOrFail($id);
    //     return view('courses.show', compact('course'));
    // }

}
