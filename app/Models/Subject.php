<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'subjects';
    protected $primaryKey = 'id_subjects';

    public $timestamps = false;

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'id_subjects'); // 'id_program' adalah foreign key di tabel variations
    }
}
