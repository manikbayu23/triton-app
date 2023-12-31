<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'times';
    protected $primaryKey = 'id_time';

    public $timestamps = false;
}
