<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FAQ;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $faqs = FAQ::paginate(10);
        return view(
            'admin.faq',
            [
                "title" => "FAQ",
                'faqs' => $faqs
            ]
        );
    }

    public function create()
    {
        return view(
            'admin.add-faq',
            [
                "title" => "FAQ"
            ]
        );
    }

    public function store(Request $request)
    {
        $testimonial = new FAQ;
        $testimonial->question = $request->input('question');
        $testimonial->answer = $request->input('answer');
        $testimonial->category = $request->input('category');
        $testimonial->created_at = Carbon::now();
        $testimonial->updated_at = Carbon::now();
        $testimonial->save();

        return redirect()->route('admin-faq.index');
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
        $faq = FAQ::find($id);
        return view(
            'admin.edit-faq',
            [
                "title" => "Edit FAQ",
                'faq' => $faq
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
        $testimonial =  FAQ::find($id);
        $testimonial->question = $request->input('question');
        $testimonial->answer = $request->input('answer');
        $testimonial->category = $request->input('category');
        $testimonial->created_at = Carbon::now();
        $testimonial->updated_at = Carbon::now();
        $testimonial->save();

        return redirect()->route('admin-faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = FAQ::find($id);

        // Delete the program from the database
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }
}
