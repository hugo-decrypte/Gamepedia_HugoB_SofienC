<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game2Character extends Model {
    protected $table = 'game2character';
    public $timestamps = false;
    protected $fillable = ['game_id', 'character_id'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function personnage()
    {
        return $this->belongsTo(Personnage::class, 'character_id', 'id');
    }
}
