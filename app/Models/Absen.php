<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = ['guru_id', 'tanggal', 'kehadiran_id'];

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru')->withDefault();
    }

    public function kehadiran()
    {
        return $this->belongsTo('App\Models\Kehadiran')->withDefault();
    }

    protected $table = 'absensi_guru';
}
