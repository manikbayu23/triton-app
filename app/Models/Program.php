<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'programs';
    protected $primaryKey = 'id_programs';
    public $timestamps = false;
    public function variations()
    {
        return $this->hasMany(Variation::class, 'id_program'); // 'id_program' adalah foreign key di tabel variations
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
}
