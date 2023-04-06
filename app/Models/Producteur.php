<?php

namespace App\Models;

class Producteur
{
    protected $primaryKey = 'idproducteur';
    protected $table = 'producteur';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function films():hasMany
    {
        return $this->hasMany(Film::class, 'idproducteur', 'idproducteur');

    }
}
