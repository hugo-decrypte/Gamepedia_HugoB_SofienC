<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2platform extends Model {
    protected $table = 'game2platform';
    public $timestamps = false;

    public function game() {
        return $this->belongsTo(Game::class, 'game_id');
    }
    public function platform() {
        return $this->belongsTo(Platform::class, 'platform_id');
    }
}