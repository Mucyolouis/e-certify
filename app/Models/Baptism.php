<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Baptism extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'address',
        'mother_name',
        'father_name',
        'godparent',
        'clergy_name',
        'church_name',
        'date',
        'is_approved',
        'user_id', // Add the user_id field here
    ];
}
