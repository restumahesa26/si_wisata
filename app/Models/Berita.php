<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    public $table = 'berita';

    public $fillable = [
        'judul', 'slug', 'isi', 'thumbnail'
    ];

    public function countView($id)
    {
        $count = BeritaView::where('berita_id', $id)->distinct('session_id')->count();

        return $count;
    }
}
