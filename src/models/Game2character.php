<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2character extends Model {
    protected $table = 'game2character';
    public $timestamps = false;

    public function game() {
        return $this->belongsTo(Game::class, "game_id", 'id');
    }

    public function personnage() {
        return $this->belongsTo(Personnage::class, 'character_id', 'id');
    }
}