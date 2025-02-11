<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game_publishers extends Model
{
    protected $table = 'game_publishers';
    public $timestamps = false;
    protected $fillable = [
        'game_id',
        'comp_id',
    ];

    function game(){
        return $this->belongsTo('gamepedia\models\Game', 'game_id');
    }
    function company(){
        return $this->belongsTo('gamepedia\models\Company', 'comp_id');
    }
}