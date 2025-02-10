<?php

namespace gampedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2theme extends Model
{
    protected $table = 'game2theme';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'game_id',
        'theme_id',
    ];
}