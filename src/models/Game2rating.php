<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2rating extends Model {
    protected $table = 'game2rating';
    protected $fillable = ['game_id', 'rating_id'];
    public $timestamps = false;

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function gameRating()
    {
        return $this->belongsTo(GameRating::class, 'rating_id', 'id');
    }
}
