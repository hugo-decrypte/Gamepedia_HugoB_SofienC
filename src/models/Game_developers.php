<?php

namespace gampedia\models;

use Illuminate\Database\Eloquent\Model;

class Game_developers extends Model
{
    protected $table = 'game_developers';
    public $timestamps = false;
    protected $primaryKey = ['game_id', 'comp_id'];
    public $incrementing = false;

    // Colonnes modifiables
    protected $fillable = [
        'game_id',
        'comp_id',
    ];
}