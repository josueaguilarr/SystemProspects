<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospects extends Model
{
    use HasFactory;

    protected $table = "prospects";

    protected $fillable = [
        'name',
        'surname',
        'second_surname',
        'status',
        'street',
        'house-number',
        'colony',
        'postal_code',
        'phone_number',
        'rfc',
        'user_id',
    ];

    protected $hidden = ['id'];
}
