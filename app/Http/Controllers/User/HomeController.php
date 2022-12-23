<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\BeritaView;
use App\Models\Review;
use App\Models\Wisata;
use App\Models\WisataView;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $wisata = Wisata::orderBy('nama', 'ASC')->paginate(3);
        $berita = Berita::latest('updated_at')->paginate(4);
        $review = Review::where('status', '1')->get();

        return view('pages.user.home', compact('wisata', 'berita', 'review'));
    }

    public function wisata()
    {
        $wisata = Wisata::orderBy('nama', 'ASC')->get();

        return view('pages.user.wisata', compact('wisata'));
    }

    public function detail_wisata($slug)
    {
        $wisata = Wisata::where('slug', $slug)->first();

        WisataView::createViewLog($wisata);

        return view('pages.user.detail-wisata', compact('wisata'));
    }

    public function berita()
    {
        $berita = Berita::orderBy('judul', 'ASC')->get();

        return view('pages.user.berita', compact('berita'));
    }

    public function detail_berita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();

        BeritaView::createViewLog($berita);

        return view('pages.user.detail-berita', compact('berita'));
    }

    public function kirim_review(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'wisata' => 'required|string',
            'review' => 'required|string',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        Review::create([
            'nama' => $request->nama,
            'wisata' => $request->wisata,
            'review' => $request->review,
            'status' => '0',
        ]);

        return redirect()->route('home')->with('success', "Terimakasih Telah Memberi Review");
    }
}
