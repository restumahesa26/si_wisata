<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class BeritaView extends Model
{
    use HasFactory;

    public $table = 'berita_views';

    public $fillable = [
        'berita_id', 'url', 'session_id', 'ip', 'agent'
    ];

    public static function createViewLog($berita) {

        $check = BeritaView::where('session_id', Request::getSession()->getId())->first();

        if ($check == NULL) {
            $wisataView= new BeritaView();
            $wisataView->berita_id = $berita->id;
            $wisataView->url = Request::url();
            $wisataView->session_id = Request::getSession()->getId();
            $wisataView->ip = Request::getClientIp();
            $wisataView->agent = Request::header('User-Agent');
            $wisataView->save();
        }
    }
}
