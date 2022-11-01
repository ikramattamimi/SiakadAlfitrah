<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $fillable = ['no_induk', 'nis', 'nama_siswa', 'kelas_id', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto', 'password'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function ulangan($id)
    {
        $guru = Guru::where('id', Auth::user()->id)->first();
        $nilai = Ulangan::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function sikap($id)
    {
        $guru = Guru::where('id', Auth::user()->id)->first();
        $nilai = Sikap::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function nilai($id)
    {
        $guru = Guru::where('id', Auth::user()->id)->first();
        $nilai = Rapot::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    protected $table = 'siswa';
}
