<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view(
            'admin.rooms',
            [
                'rooms' => $rooms
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
        $room = new Room;
        $room->room_name = $request->input('room_name');
        $room->created_at = Carbon::now();
        $room->updated_at = Carbon::now();
        $room->save();

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
        $room = Room::findOrFail($id);
        $room->room_name = $request->input('room_name');
        $room->created_at = Carbon::now();
        $room->updated_at = Carbon::now();
        $room->save();

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
        $room = Room::find($id);

        if (!$room) {
            return redirect()->back()->with('error', 'Ruangan tidak ditemukan');
        }

        $room->delete();
        return redirect()->back()->with('success', 'Ruangan Berhasil Dihapus');
    }
}
