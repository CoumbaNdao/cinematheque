<?php

namespace App\Models;

class Jouer
{
    protected $primaryKey = 'idacteur';
    protected $table = 'jouer';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function acteur():hasMany
    {
        return $this->hasMany(Acteur::class,'idacteur','idacteur');
    }
    public function film():hasMany
    {
        return $this->hasMany(Acteur::class,'idfilm','idfilm');
    }
}
