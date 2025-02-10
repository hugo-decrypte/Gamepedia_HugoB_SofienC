<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Personnage extends Model {
    protected $table = 'personnage';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'real_name', 'last_name', 'alias', 'birthday', 'gender', 'deck', 'description', 'first_appeared_in_game_id'];
    public $timestamps = true;

    public function firstAppearedInGame() {
        return $this->belongsTo(Game::class, 'first_appeared_in_game_id');
    }

    public function game2character() {
        return $this->hasMany(Game2character::class, 'character_id', 'id');
    }
}