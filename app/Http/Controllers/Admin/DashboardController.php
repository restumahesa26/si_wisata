<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\BeritaView;
use App\Models\Wisata;
use App\Models\WisataView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $wisata = Wisata::count();
        $berita = Berita::count();
        $wisataView = WisataView::whereDate('created_at', Carbon::now())->distinct('session_id')->count();
        $beritaView = BeritaView::whereDate('created_at', Carbon::now())->distinct('session_id')->count();
        $wisataViewWeek = WisataView::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->distinct('session_id')->count();
        $beritaViewWeek = BeritaView::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->distinct('session_id')->count();

        $wisataNama = Wisata::orderBy('nama', 'ASC')->pluck('nama');
        $wisataId = Wisata::orderBy('nama', 'ASC')->pluck('id');

        return view('pages.admin.dashboard', compact('wisata', 'berita', 'wisataView', 'beritaView', 'wisataViewWeek', 'beritaViewWeek', 'wisataNama', 'wisataId'));
    }

    public function upload(Request $request)
    {
        if($request->file('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images-ck-editor'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images-ck-editor/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
