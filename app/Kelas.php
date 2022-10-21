<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = ['paket_id', 'nama_kelas', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }

    protected $table = 'kelas';
}
