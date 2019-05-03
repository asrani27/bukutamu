<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';

    public function pemohon()
    {
        return $this->hasMany(Pemohon::class);
    }
}
