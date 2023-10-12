<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'faqs';
    protected $primaryKey = 'id_faq';

    public $timestamps = false;
}
