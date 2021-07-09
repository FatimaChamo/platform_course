<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    //uno a muchos 
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    //uno a muchos 

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }
    //fin

    //curso - usuario 1 a muchos inversa
    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //muchos a muchos de la tabla pivote , sino da el users poner el teacher
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //uno a muchos inversa con level, categories y price
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    //uno a muchos inversa
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //uno a muchos inversa
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    //uno a uno polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //relacion de curso con lecciones a travez de secciones 
    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
    

}

