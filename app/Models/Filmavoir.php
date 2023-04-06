<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filmavoir extends Model
{
    protected $primaryKey = 'idutilisateur';
    protected $table = 'filmavoir';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function utilisateur():hasMany
    {
        return $this->hasMany(Utilisateur::class,'idutilisateur','idutilisateur');
    }
    public function film():hasMany
    {
        return $this->hasMany(Utilisateur::class,'idfilm','idfilm');
    }
}
