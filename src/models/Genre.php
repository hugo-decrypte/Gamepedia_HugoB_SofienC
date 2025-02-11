<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'deck',
        'description',
    ];

    function game2genre(){
        return $this->hasMany(Game2genre::class, 'genre_id', 'id');
    }


}