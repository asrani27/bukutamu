<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table ='kecamatan';

    protected $fillable = ['kode','nama'];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
