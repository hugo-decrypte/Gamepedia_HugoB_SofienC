<?php

namespace gamepedia\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $table = 'company';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'abbreviation', 'deck', 'description', 'date_founded', 'location_address', 'location_city', 'location_country', 'location_state', 'phone', 'website'];
    public $timestamps = true;
}
