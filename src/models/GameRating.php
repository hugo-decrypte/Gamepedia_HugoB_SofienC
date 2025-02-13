<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class GameRating extends Model
{
    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'rating_board_id',
    ];
    public function ratingBoard() {
        return $this->belongsTo(RatingBoard::class, 'rating_board_id', 'id');
    }

    public function game2rating() {
        return $this->hasMany(Game2rating::class, 'rating_id', 'id');
    }

}