<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lieu extends Model
{
    protected $primaryKey = 'idlieu';
    protected $table = 'lieu';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function evenement():hasMany
    {
        return $this->hasMany(Evenement::class, 'idlieu', 'idlieu');

    }

}
