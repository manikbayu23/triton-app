<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::paginate(10);
        return view(
            'admin.times',
            [
                'times' => $times
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = new Time;
        $time->time = $request->input('time');
        $time->day = $request->input('day');
        $time->created_at = Carbon::now();
        $time->updated_at = Carbon::now();
        $time->save();

        return redirect()->back()->with('success', "Data Berhasil Disimpan");
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
        //
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
        $time = Time::findOrFail($id);
        $time->time = $request->input('time');
        $time->day = $request->input('day');
        $time->created_at = Carbon::now();
        $time->updated_at = Carbon::now();
        $time->save();

        return redirect()->back()->with('success', "Data Berhasil Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::find($id);

        if (!$time) {
            return redirect()->back()->with('error', 'Data Waktu tidak ditemukan');
        }

        $time->delete();
        return redirect()->back()->with('success', 'Data Waktu Berhasil Dihapus');
    }
}
