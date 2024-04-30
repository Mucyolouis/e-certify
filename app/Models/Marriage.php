<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'bride_first_name',
        'bride_last_name',
        'groom_first_name',
        'groom_last_name',
        'god_mother_name',
        'god_father_name',
        'telephone',
        'address',
        'date',
        'clergy_name',
        'church_name',
        'is_approved',
        'user_id', // Add the user_id field here
    ];

    //protected $guarded = []; 
}
