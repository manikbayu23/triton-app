<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Variation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(10);

        return view('admin.bookings', [
            'bookings' => $bookings,
        ]);
    }
    public function confirmation(Request $request, $id)
    {
        $status = $request->input('statusValue');

        $booking = Booking::find($id);
        $booking->status = $status;
        $booking->save();

        $id_variation = $booking->id_variation;
        if ($status == 1) {
            $variation = Variation::where('id_variation', $id_variation)->first();
            $variation->capacity = $variation->capacity - $status;
            $variation->save();
        }
        return response()->json();
    }
    public function show($id)
    {
        $booking = Booking::find($id);

        return view('admin.booking-detail', [
            'booking' => $booking,
        ]);
    }
}
