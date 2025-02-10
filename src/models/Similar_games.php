<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Similar_games extends Model
{
    protected $table = 'similar_games';
    protected $fillable = ['game1_id', 'game2_id'];

    //protected $primaryKey = '';
    public $timestamps = false;
}