<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2rating extends Model {
    protected $table = 'game2rating';
    public $timestamps = false;

    public function game() {
        return $this->belongsTo(Game::class, 'game_id');
    }
}