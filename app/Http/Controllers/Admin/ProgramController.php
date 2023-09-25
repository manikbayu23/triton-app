<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Time;
use App\Models\Level;
use App\Models\Program;
use App\Models\Variation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        $programs = Program::all();
        return view(
            'admin.programs',
            [
                'levels' => $levels,
                'programs' => $programs
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
        $levels = Level::all();
        $rooms = Room::all();
        $times = Time::all();
        return view(
            'admin.add-program',
            [
                'levels' => $levels,
                'rooms' => $rooms,
                'times' => $times,
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

        $program = new Program;
        $program->program_name = $request->input('program_name');
        $program->front_description = $request->input('front_description');
        $program->main_description = $request->input('main_description');
        $program->senior_description = $request->input('senior_description');
        $program->junior_description = $request->input('junior_description');
        $program->elementary_description = $request->input('elementary_description');
        $program->created_at = Carbon::now();
        $program->updated_at = Carbon::now();

        // Handle image upload
        if ($request->hasFile('program_img')) {
            $image = $request->file('program_img'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $program->program_img = 'assets/gambar/' . $imageName; // Set the image path
        }
        $program->save();

        $id_levels = $request->input('id_level');
        $id_rooms = $request->input('id_room');
        $id_times = $request->input('id_time');
        $capacities = $request->input('capacity');
        $prices = $request->input('price');

        foreach ($id_levels as $index => $id_level) {
            $variation = new Variation;
            $variation->id_level = $id_level;
            $variation->id_program = $program->id_programs; // Menggunakan id program yang baru dibuat
            $variation->id_room = $id_rooms[$index];
            $variation->id_time = $id_times[$index]; // Ganti 'id_time' menjadi 'id_room'
            $variation->capacity = $capacities[$index];
            $variation->price = $prices[$index];
            $variation->save();
        }

        return redirect()->route('list_program.index')->with('success', 'Program berhasil ditambahkan');
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
        $rooms = Room::all();
        $times = Time::all();
        $levels = Level::all();
        $program = Program::with('variations')->find($id);
        return view(
            'admin.edit-program',
            [
                'levels' => $levels,
                'rooms' => $rooms,
                'program' => $program,
                'times' => $times
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
        $program = Program::find($id);
        $program->program_name = $request->input('program_name');
        $program->front_description = $request->input('front_description');
        $program->main_description = $request->input('main_description');
        $program->senior_description = $request->input('senior_description');
        $program->junior_description = $request->input('junior_description');
        $program->elementary_description = $request->input('elementary_description');
        $program->created_at = Carbon::now();
        $program->updated_at = Carbon::now();

        // Handle image upload
        if ($request->hasFile('program_img')) {
            $image = $request->file('program_img'); // Get the uploaded image file

            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp . '-' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;

            $image->move(public_path('assets/gambar'), $imageName);
            $program->program_img = 'assets/gambar/' . $imageName; // Set the image path
        }
        $program->save();

        // Ambil data variasi yang ada
        $id_variations = $request->input('id_variation');
        $id_levels = $request->input('id_level');
        $id_rooms = $request->input('id_room');
        $id_times = $request->input('id_time');
        $capacities = $request->input('capacity');
        $prices = $request->input('price');

        // Iterasi melalui data variasi yang ada
        if ($id_variations !== null) {
            foreach ($id_variations as $index => $id_variation) {
                $variation = Variation::find($id_variation);
                $variation->id_level = $id_levels[$index];
                $variation->id_room = $id_rooms[$index];
                $variation->id_time = $id_times[$index]; // Ganti 'id_time' menjadi 'id_room'
                $variation->capacity = $capacities[$index];
                $variation->price = $prices[$index];
                $variation->save();
            }
        }

        // Cek apakah ada variasi baru yang ditambahkan
        $new_variations = $request->input('new_variation');

        if ($new_variations && is_array($new_variations)) {
            foreach ($new_variations as $new_variation) {
                $variation = new Variation();
                $variation->id_program = $program->id_programs;
                $variation->id_level = $new_variation['id_level'];
                $variation->id_room = $new_variation['id_room'];
                $variation->id_time = $new_variation['id_time'];
                $variation->capacity = $new_variation['capacity'];
                $variation->price = $new_variation['price'];
                $variation->save();
            }
        }


        return redirect()->route('list_program.index')->with('success', 'Program berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return redirect()->back()->with('error', 'Program not found');
        }

        // Delete associated image if it exists
        if ($program->image) {
            Storage::delete($program->image); // Delete the image from storage
        }

        // Delete the program from the database
        $program->delete();

        return redirect()->back()->with('success', 'Program deleted successfully');
    }
    public function destroy_variation($id)
    {
        $variation = Variation::find($id);

        $variation->delete();

        return redirect()->back()->with('success', 'Variation deleted successfully');
    }
}
