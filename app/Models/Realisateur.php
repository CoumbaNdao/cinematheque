<?php

namespace App\Models;

class Realisateur
{
    protected $primaryKey = 'idrealisateur';
    protected $table = 'realisateur';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function films():hasMany
    {
        return $this->hasMany(Film::class, 'idrealisateur', 'idrealisateur');

    }
}
