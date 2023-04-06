<?php

namespace App\Models;



class Admin extends Utilisateur
{
    protected $table = 'admin';
    protected $primaryKey = 'idadmin';
    protected $fillable = ['idadmin'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'idadmin');
    }

}
