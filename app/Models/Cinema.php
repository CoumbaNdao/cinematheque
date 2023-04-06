<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $primaryKey = 'idcinema';
    protected $table = 'cinema';
    protected $keyType = 'integer';
    protected $guarded = [];
}
