<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tikit extends Model
{
    use HasFactory;
    protected $fillable=[
        "bass_name",
            "location",
            "seat_numver",
    ];
}
