<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $table = 'pemohon';

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
}
