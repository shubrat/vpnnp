<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'phone',
        'email',
        'subject',
        'usermessage',
    ];


    protected $hidden = [
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

 
}
