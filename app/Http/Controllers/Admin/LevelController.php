<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::paginate(10);
        return view('admin.level', [
            'levels' => $levels,
        ]);
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
        $level = new Level;
        $level->level_name = $request->input('level_name');
        $level->category = $request->input('category');
        $level->created_at = Carbon::now();
        $level->updated_at = Carbon::now();
        $level->save();

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
        $level = Level::findOrFail($id);
        $level->level_name = $request->input('level_name');
        $level->category = $request->input('category');
        $level->created_at = Carbon::now();
        $level->updated_at = Carbon::now();
        $level->save();

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
        $level = Level::find($id);

        if (!$level) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan');
        }

        $level->delete();
        return redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
    }
}
