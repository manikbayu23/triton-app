<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'testimonials';
    protected $primaryKey = 'id_testimonial';
}