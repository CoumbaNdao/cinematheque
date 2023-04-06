<?php

namespace App\Models;

class Internaute extends Utilisateur
{
    protected $table = 'internaute';
    protected $primaryKey = 'idinternaute';
    protected $fillable = ['idinternaute', 'pseudo'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'idinternaute');
    }

}
