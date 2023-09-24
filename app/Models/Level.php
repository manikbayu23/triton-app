<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'levels';
    protected $primaryKey = 'id_levels';

    public $timestamps = false;
}
