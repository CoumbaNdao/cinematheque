<?php

namespace App\Models;

class Evenement
{
    protected $primaryKey = 'idevenement';
    protected $table = 'evenement';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function lieu():hasOne
    {
        return $this->hasOne(Lieu::class, 'idlieu', 'idlieu');
    }
    public function recompenses():hasMany
    {
        return $this->hasMany(Recompense::class, 'idevenement', 'idevenement');

    }
}
