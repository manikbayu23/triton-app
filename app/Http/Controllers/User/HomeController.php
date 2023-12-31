<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Level;
use App\Models\Booking;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\Time;
use App\Models\Variation;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $programs = Program::all();
        $testimonials = Testimoni::orderBy('id_testimonial', 'asc')->paginate(10);
        return view(
            'user.pages.home',
            [
                "title" => "Home",
                'programs' => $programs,
                'subjects' => $subjects,
                'testimonials' => $testimonials
            ]
        );
    }


    public function show($id)
    {
        $program = Program::with('variations')->find($id);
        $times = Time::all();

        $previous = Program::where('id_programs', '<', $id)->orderBy('id_programs', 'desc')->first();
        $next = Program::where('id_programs', '>', $id)->orderBy('id_programs')->first();

        // Mencari program dengan ID terbesar dan terkecil
        $maxIdProgram = Program::max('id_programs');
        $minIdProgram = Program::min('id_programs');

        // Jika program berikutnya tidak ada, beralih ke program dengan ID terkecil
        if (!$next) {
            $next = Program::where('id_programs', $minIdProgram)->first();
        }

        // Jika program sebelumnya tidak ada, beralih ke program dengan ID terbesar
        if (!$previous) {
            $previous = Program::where('id_programs', $maxIdProgram)->first();
        }

        $programs = Program::all();
        return view(
            'user.pages.program',
            [
                "title" => "Program",
                'program' => $program,
                'times' => $times,
                'previous' => $previous,
                'next' => $next,
                'programs' => $programs
            ]
        );
    }
    public function booking(Request $request)
    {

        $prefix = 'TRN';
        $randomString = Str::random(6); // Membuat string acak sepanjang 6 karakter
        $generatedCode = $prefix . '-' . $randomString;

        $level = $request->input('id_level');
        $room = $request->input('id_room');
        $time = $request->input('id_time');
        $name = $request->input('name');

        $variation = Variation::where('id_level', $level)
            ->where('id_room', $room)
            ->where('id_time', $time)
            ->first();

        $booking = new Booking;
        $booking->booking_code = $generatedCode;
        $booking->id_programs = $request->input('id_programs');
        $booking->id_variation = $variation->id_variation;
        $booking->id_level = $level;
        $booking->id_room = $room;
        $booking->id_time = $time;
        $booking->name = $name;
        $booking->place_birth = $request->input('place_birth');
        $booking->date_birth = $request->input('date_birth');
        $booking->phone_number = $request->input('phone_number');
        $booking->school = $request->input('school');
        $booking->parent_name = $request->input('parent_name');
        $booking->parent_phone_number = $request->input('parent_phone_number');
        $booking->parent_job = $request->input('parent_job');
        $booking->address = $request->input('address');
        $booking->booking_date = Carbon::now();
        $booking->status = '0';
        $booking->created_at = Carbon::now();
        $booking->updated_at = Carbon::now();
        $booking->save();

        $request->session()->put('booking_data', [
            'booking_code' => $generatedCode,
            'name' => $name,
            'level' => $variation->level->level_name,
            'time' => $variation->time->time,
            'room_name' => $variation->room->room_name,
            'price' => $variation->price,
            'booking_date' => Carbon::now(),
            'status' => 0,
        ]);

        return redirect()->route('payment')->with('success', 'Berhasil Memesan');
    }

    public function tentor($id)
    {
        $tentor = Subject::find($id);

        $teacher = Teacher::where('id_subjects', $id)->get();

        return view(
            'user.pages.tentor',
            [
                "title" => "Tentor",
                'tentor' => $tentor,
                'teacher' => $teacher
            ]
        );
    }

    public function payment(Request $request)
    {
        $bookingData = $request->session()->get('booking_data');
        // dd($bookingData);
        return view(
            'user.pages.payment',
            [
                "title" => "Pembayaran",
                'booking' => $bookingData
            ]
        );
    }

    public function vision()
    {
        return view(
            'user.pages.vision',
            [
                "title" => "Pembayaran"
            ]
        );
    }

    public function show_room(Request $request)
    {
        $id_level = $request->input('id_level');
        $id_program = $request->input('id_program');
        $id_time = $request->input('id_time');

        $room = Variation::where('id_level', $id_level)
            ->where('id_program', $id_program)
            ->where('id_time', $id_time)
            ->with('room')->get();

        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }
}
