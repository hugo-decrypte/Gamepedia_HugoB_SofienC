<?php

namespace gampedia\models;

use Illuminate\Database\Eloquent\Model;

class Game_publishers extends Model
{
    protected $table = 'game_publishers';
    public $timestamps = false;
    protected $fillable = [
        'game_id',
        'comp_id',
    ];
}