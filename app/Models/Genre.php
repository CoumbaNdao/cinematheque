<?php

namespace App\Models;

class Genre
{
    protected $primaryKey = 'idgenre';
    protected $table = 'genre';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function film():hasMany
    {
        return $this->hasMany(Film::class, 'idgenre', 'idgenre');

    }

}
