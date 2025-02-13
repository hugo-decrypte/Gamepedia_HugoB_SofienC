<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model {
    protected $table = 'friends';
    public $timestamps = false;
    protected $fillable = ['char1_id', 'char2_id'];

    public function character1()
    {
        return $this->belongsTo(Personnage::class, 'char1_id', 'id');
    }

    public function character2()
    {
        return $this->belongsTo(Personnage::class, 'char2_id', 'id');
    }
}
