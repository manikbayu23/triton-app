<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(20);

        return view(
            'admin.teacher',
            [
                "title" => "Teacher",
                "teachers" => $teachers

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view(
            'admin.add-teacher',
            [
                "title" => "Tambah Pengajar",
                'subjects' => $subjects
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher;
        $teacher->teacher_name = $request->input('teacher_name');
        $teacher->alumni = $request->input('alumni');
        $teacher->id_subjects = $request->input('id_subjects');
        $teacher->created_at = Carbon::now();
        $teacher->updated_at = Carbon::now();
        if ($request->hasFile('teacher_img')) {
            $image = $request->file('teacher_img'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $teacher->teacher_img = 'assets/gambar/' . $imageName; // Set the image path
        }
        $teacher->save();

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $subjects = Subject::all();

        return view(
            'admin.edit-teacher',
            [
                'teacher' => $teacher,
                'subjects' => $subjects
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->teacher_name = $request->input('teacher_name');
        $teacher->alumni = $request->input('alumni');
        $teacher->id_subjects = $request->input('id_subjects');
        $teacher->created_at = Carbon::now();
        $teacher->updated_at = Carbon::now();
        if ($request->hasFile('teacher_img')) {
            $image = $request->file('teacher_img'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $teacher->teacher_img = 'assets/gambar/' . $imageName; // Set the image path
        }
        $teacher->save();

        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        // Delete the program from the database
        $teacher->delete();

        return redirect()->back()->with('success', 'Pengajar deleted successfully');
    }
}
