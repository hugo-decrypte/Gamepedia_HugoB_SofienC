<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2genre extends Model {
    protected $table = 'game2genre';
    public $timestamps = false;

    public function game() {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}