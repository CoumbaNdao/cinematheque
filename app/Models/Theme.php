<?php

namespace App\Models;

class Theme
{
    protected $primaryKey = 'idtheme';
    protected $table = 'theme';
    protected $keyType = 'integer';
    protected $guarded = [];
    public function films():hasMany
    {
        return $this->hasMany(Film::class, 'idtheme', 'idtheme');

    }
}
