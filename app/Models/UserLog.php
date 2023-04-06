<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'datelog';
    protected $table = 'userlog';
    protected $keyType = 'string';
    protected $guarded = [];

    public function scopenbConnexion($query)
    {
        return $query->join('utilisateur', 'idutilisateur', '=', 'id')
            ->get();
    }

//    public function scopenbConnexionInternaute($query)
//    {
//        return $query->join('internaute', 'idinternaute', '=', 'id')
//            ->where('statut', '=', 4)
//            ->get();
//    }
}
