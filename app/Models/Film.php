<?php

namespace App\Models;

class Film
{
    protected $primaryKey = 'idfilm';
    protected $table = 'film';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function genre():hasOne
    {
        return $this->hasOne(Genre::class, 'idgenre', 'idgenre');
    }
    public function theme():hasOne
    {
        return $this->hasOne(Theme::class, 'idtheme', 'idtheme');
    }
    public function realisateur():hasOne
    {
        return $this->hasOne(Realisateur::class, 'idrealisateur', 'idrealisateur');
    }
    public function producteur():hasOne
    {
        return $this->hasOne(Producteur::class, 'idproducteur', 'idproducteur');
    }
    public function jouer()
    {
        return $this->hasMany(Jouer::class, 'idfilm','idfilm');
    }
    public function critique_user():hasOne
    {
        return $this->hasOne(Critique::class, 'critique.idfilm','film.idfilm');
    }

    public function filmvus()
    {
        return $this->hasMany(Filmvus::class, 'idfilm','idfilm');
    }
    public function filmavoir()
    {
        return $this->hasMany(Filmvus::class, 'idfilm','idfilm');
    }
    public function seance()
    {
        return $this->hasMany(Seance::class, 'idfilm','idfilm');
    }
}
