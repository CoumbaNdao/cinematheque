<?php

namespace App\Models;

class Recompense
{
    protected $primaryKey = 'idrecompense';
    protected $table = 'recompense';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function evenements():hasOne
    {
        return $this->hasOne(Evenement::class, 'idevenement', 'idevenement');
    }
}
