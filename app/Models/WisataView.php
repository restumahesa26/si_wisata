<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class WisataView extends Model
{
    use HasFactory;

    public $table = 'wisata_views';

    public $fillable = [
        'wisata_id', 'url', 'session_id', 'ip', 'agent'
    ];

    public static function createViewLog($wisata) {

        $check = WisataView::where('session_id', Request::getSession()->getId())->first();

        if ($check == NULL) {
            $wisataView= new WisataView();
            $wisataView->wisata_id = $wisata->id;
            $wisataView->url = Request::url();
            $wisataView->session_id = Request::getSession()->getId();
            $wisataView->ip = Request::getClientIp();
            $wisataView->agent = Request::header('User-Agent');
            $wisataView->save();
        }
    }
}
