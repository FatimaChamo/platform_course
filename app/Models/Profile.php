<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion inversa 1 -1 
    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}
