<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view(
            'admin.course',
            [
                "title" => "Kelas",
                'subjects' => $subjects
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
        return view(
            'admin.add-course',
            [
                "title" => "Tambah Kelas",
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
        $teacher = new Subject;
        $teacher->subject_name = $request->input('subject_name');
        $teacher->created_at = Carbon::now();
        $teacher->updated_at = Carbon::now();
        if ($request->hasFile('subject_img')) {
            $image = $request->file('subject_img'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $teacher->subject_img = 'assets/gambar/' . $imageName; // Set the image path
        }
        $teacher->save();

        return redirect()->route('subject.index');
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        return view(
            'admin.edit-course',
            [
                "title" => "Edit Kelas",
                'subject' => $subject
            ]
        );
    }

    public function update(Request $request, $id)
    {

        $teacher = Subject::find($id);
        $teacher->subject_name = $request->input('subject_name');
        $teacher->created_at = Carbon::now();
        $teacher->updated_at = Carbon::now();
        if ($request->hasFile('subject_img')) {
            $image = $request->file('subject_img'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $teacher->subject_img = 'assets/gambar/' . $imageName; // Set the image path
        }
        $teacher->save();

        return redirect()->route('subject.index');
    }

    public function destroy($id)
    {

        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan');
        }

        $subject->delete();
        return redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
    }
}
