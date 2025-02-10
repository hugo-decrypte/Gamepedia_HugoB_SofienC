<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model {
    protected $table = 'theme';
    protected $fillable = ['id', 'name'];
    protected $primaryKey = 'id';
    public $timestamps = false;

}