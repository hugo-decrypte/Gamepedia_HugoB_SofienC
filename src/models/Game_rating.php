<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Game_rating extends Model
{
    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'rating_board_id',
    ];
    public function rating_board() {
        return $this->belongsTo(Rating_board::class, 'rating_board_id', 'id');
    }

    public function game2rating() {
        return $this->hasMany(Game2rating::class, 'rating_id', 'id');
    }

}