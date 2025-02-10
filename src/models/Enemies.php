<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Enemies extends Model {
    protected $table = 'enemies';
    public $timestamps = false;

    public function character1() {
        return $this->belongsTo(Personnage::class, 'char1_id');
    }

    public function character2() {
        return $this->belongsTo(Personnage::class, 'char2_id');
    }
}