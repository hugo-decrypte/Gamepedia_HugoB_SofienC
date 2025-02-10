<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Rating_board extends Model
{
    protected $table = 'rating_board';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'deck', 'description',];
}