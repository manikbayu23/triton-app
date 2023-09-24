<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Time;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'variations';
    protected $primaryKey = 'id_variation';
    public $timestamps = false;
    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }
    public function time()
    {
        return $this->belongsTo(Time::class, 'id_time');
    }
}
