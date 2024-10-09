<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'info'; // Update this with the actual table name

    protected $fillable = [
        'user_id', 'image', 'about', 'campus', 'position', 'address',  'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
