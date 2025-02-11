<?php

namespace gamepedia\models;

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

    function game(){
        return $this->belongsTo('gamepedia\models\Game', 'game_id');
    }
    function theme(){
        return $this->belongsTo('gamepedia\models\Theme', 'theme_id');
    }
}