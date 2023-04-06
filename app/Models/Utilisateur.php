<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Authenticatable
{
    use Notifiable,HasApiTokens,  HasFactory;

    protected $table = 'utilisateur';
    protected $primaryKey = 'idutilisateur';
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'created_at', 'updated_at'
    ];

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class, 'idadmin');
    }

    public function internaute(): HasOne
    {
        return $this->hasOne(Internaute::class, 'idinternaute');
    }

    public function journaliste(): HasOne
    {
        return $this->hasOne(Journaliste::class, 'idjournaliste', 'idutilisateur');
    }

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
        $this->save();
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
