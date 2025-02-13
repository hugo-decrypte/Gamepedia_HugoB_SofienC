<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class SimilarGame extends Model
{
    protected $table = 'similar_games';
    protected $fillable = ['game1_id', 'game2_id'];

    //protected $primaryKey = '';
    public $timestamps = false;

    function game1() {
        return $this->belongsTo(Game::class, 'game1_id');
    }
    function game2() {
        return $this->belongsTo(Game::class, 'game2_id');
    }
}