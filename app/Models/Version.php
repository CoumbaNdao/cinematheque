<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $primaryKey = 'idversion';
    protected $table = 'version';
    protected $keyType = 'integer';
    protected $guarded = [];

}
