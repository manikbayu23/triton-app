<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Testimoni;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimoni::paginate(10);
        return view(
            'admin.testimonial',
            [
                "title" => "Testimonial",
                'testimonials' => $testimonials
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
            'admin.add-testimonial',
            [
                "title" => "Testimonial"
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
        $testimonial = new Testimoni;
        $testimonial->name = $request->input('name');
        $testimonial->school = $request->input('school');
        $testimonial->accepted = $request->input('accepted');
        $testimonial->description = $request->input('description');
        $testimonial->created_at = Carbon::now();
        $testimonial->updated_at = Carbon::now();
        if ($request->hasFile('img_testimonial')) {
            $image = $request->file('img_testimonial'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $testimonial->img_testimonial = 'assets/gambar/' . $imageName; // Set the image path
        }
        $testimonial->save();

        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimoni::find($id);
        return view(
            'admin.edit-testimonial',
            [
                "title" => "Edit Testimonial",
                'testimonial' => $testimonial
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
        $testimonial =  Testimoni::find($id);
        $testimonial->name = $request->input('name');
        $testimonial->school = $request->input('school');
        $testimonial->accepted = $request->input('accepted');
        $testimonial->description = $request->input('description');
        $testimonial->created_at = Carbon::now();
        $testimonial->updated_at = Carbon::now();
        if ($request->hasFile('img_testimonial')) {
            $image = $request->file('img_testimonial'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $testimonial->img_testimonial = 'assets/gambar/' . $imageName; // Set the image path
        }
        $testimonial->save();

        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimoni::find($id);

        // Delete the program from the database
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }
}
