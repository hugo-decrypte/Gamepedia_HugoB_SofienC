<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class GameDeveloper extends Model {
    protected $table = 'game_developers';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = ['game_id', 'comp_id'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'comp_id', 'id');
    }
}
