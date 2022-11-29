<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessMail extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
   
    protected $hidden = [
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function services(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
