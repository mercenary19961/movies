<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'role',
        'image',
    ];

    public function script()
    {
        return $this->hasOne(Script::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

}
