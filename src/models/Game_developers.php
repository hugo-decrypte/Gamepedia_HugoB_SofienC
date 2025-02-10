<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game_developers extends Model
{
    protected $table = 'game_developers';
    public $timestamps = false;
    protected $primaryKey = ['game_id', 'comp_id'];
    public $incrementing = false;

    // Colonnes modifiables
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