<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seance extends Model
{
    protected $primaryKey = 'idcinema';
    protected $table = 'seance';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function acteur():hasMany
    {
        return $this->hasMany(Cinema::class,'idcinema','idcinema');
    }
    public function film():hasMany
    {
        return $this->hasMany(Cinema::class,'idfilm','idfilm');
    }
}
