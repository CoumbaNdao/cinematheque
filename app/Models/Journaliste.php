<?php

namespace App\Models;

class Journaliste extends Utilisateur
{
    protected $table = 'journaliste';
    protected $guarded = [];
    protected $fillable = ['idjournaliste', 'idpresse'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'idjournaliste');
    }
}
