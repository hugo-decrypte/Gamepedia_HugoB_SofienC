<?php

namespace gampedia\models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platform';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'alias',
        'abbreviation',
        'deck',
        'description',
        'c_id',
        'install_base',
        'release_date',
        'online_support',
        'original_price',
    ];

    // Champs temporels gérés automatiquement par Laravel
    public $timestamps = true;

    // Format des colonnes temporelles personnalisées si nécessaire
    protected $casts = [
        'release_date' => 'datetime',
        'original_price' => 'decimal:2',
        'online_support' => 'boolean',
    ];

}