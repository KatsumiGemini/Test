<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table="forms";
    
    protected $fillable = [
        'admin_id',
        'user_id',
        'office_id',
        'client',
        'sex',
        'age',
        'region',
        'service',
        'ccone',
        'cctwo',
        'ccthree',
        'sqdzero',
        'sqdone',
        'sqdtwo',
        'sqdthree',
        'sqdfour',
        'sqdfive',
        'sqdsix',
        'sqdseven',
        'sqdeight',
        'suggest',
        'contact',
    ];
    
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function office()
    {
        return $this->belongsTo(User::class, 'office_id');
    }
}
