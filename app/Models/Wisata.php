<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    public $table = 'wisata';

    public $fillable = [
        'nama', 'slug', 'deskripsi', 'jam_buka', 'jam_tutup', 'harga_tiket', 'link_youtube', 'lokasi_url', 'kode_unik', 'hari_awal', 'hari_akhir'
    ];

    function format_tanggal($tanggal){
        $hasil = Carbon::parse($tanggal)->translatedFormat('H:i');

        return $hasil;
    }

    function format_uang($angka){
        $hasil = number_format($angka,0,',','.');

        return $hasil;
    }

    public function foto(){
        return $this->hasMany(WisataFoto::class, 'wisata_id', 'id');
    }

    public function fotoOne(){
        return $this->hasOne(WisataFoto::class, 'wisata_id', 'id');
    }

    public function countView($id)
    {
        $count = WisataView::where('wisata_id', $id)->distinct('session_id')->count();

        return $count;
    }
}
