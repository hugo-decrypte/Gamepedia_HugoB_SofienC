<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    protected $table = 'game';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'alias', 'deck', 'description', 'expected_release_day',
        'expected_release_month', 'expected_release_quarter', 'expected_release_year',
        'original_release_date'
    ];
    public $timestamps = true;

    public function game2character()
    {
        return $this->hasMany(Game2character::class, 'game_id', 'id');
    }

    public function gameDeveloper()
    {
        return $this->hasMany(GameDeveloper::class, 'game_id', 'id');
    }

    public function game2rating()
    {
        return $this->hasMany(Game2rating::class, 'game_id', 'id');
    }

    public function game2genre()
    {
        return $this->hasMany(Game2genre::class, 'game_id', 'id');
    }

    public function game2platform()
    {
        return $this->hasMany(Game2platform::class, 'game_id', 'id');
    }

    public function game2theme()
    {
        return $this->hasMany(Game2theme::class, 'game_id', 'id');
    }

    public function gamePublisher(){
        return $this->hasMany(GamePublisher::class, 'game_id', 'id');
    }
}
