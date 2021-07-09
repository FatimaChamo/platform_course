<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //uno a uno 
    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }

    //uno a mucho inversa
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    //uno a mucho inversa
    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    //relacion muchos a muchos 
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //uno a uno polimorfica
    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //uno a mucho polimorfica
    public function comments()
    {
        return $this->morphToMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
