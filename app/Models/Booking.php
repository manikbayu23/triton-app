<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Time;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bookings';
    protected $primaryKey = 'id_booking';
    public $timestamps = false;
    public function program()
    {
        return $this->belongsTo(Program::class, 'id_programs'); // 'id_program' adalah foreign key di tabel variations
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level'); // 'id_level' adalah
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room'); // 'id_level' adalah
    }
    public function time()
    {
        return $this->belongsTo(Time::class, 'id_time'); // 'id_level' adalah
    }
}
