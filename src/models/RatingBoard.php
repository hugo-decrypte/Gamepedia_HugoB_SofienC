<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class RatingBoard extends Model
{
    protected $table = 'rating_board';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'deck', 'description',];

    public function game2rating()
    {
        return $this->hasMany('gamepedia\models\Game2rating', 'rating_board_id', 'id');
    }
}