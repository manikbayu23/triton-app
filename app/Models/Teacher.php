<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $table = 'teacher';
    protected $primaryKey = 'id_teacher';

    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'id_subjects'); // 'id_program' adalah foreign key di tabel variations
    }
}
