<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\WisataFoto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Wisata::latest('updated_at')->get();

        return view('pages.admin.wisata.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi_url' => 'required|string',
            'jam_buka' => 'nullable|date_format:H:i',
            'jam_tutup' => 'nullable|date_format:H:i',
            'harga_tiket' => 'nullable|integer',
            'link_youtube' => 'nullable|string',
            'hari_awal' => "nullable|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu",
            'hari_akhir' => "nullable|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu",
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        $foto = array();

        if ($request->file('foto')) {
            foreach ($request->file('foto') as $value) {
                $extension = $value->extension();
                $imageNames = uniqid('img_', microtime()) . '.' . $extension;
                Storage::putFileAs('public/images/gambar-wisata', $value, $imageNames);
                $thumbnailpath = public_path('storage/images/gambar-wisata/' . $imageNames);
                Image::make($thumbnailpath)->resize(800, 600)->save($thumbnailpath);
                $foto[] = $imageNames;
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Tolong Masukkan Gambar');
        }

        $wisata = Wisata::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'harga_tiket' => $request->harga_tiket,
            'link_youtube' => $request->link_youtube,
            'lokasi_url' => $request->lokasi_url,
            'hari_awal' => $request->hari_awal,
            'hari_akhir' => $request->hari_akhir,
            'kode_unik' => uniqid('wisata-', microtime()),
        ]);

        foreach ($foto as $value) {
            WisataFoto::create([
                'wisata_id' => $wisata->id,
                'foto' => $value
            ]);
        }

        return redirect()->route('data-wisata.index')->with('success', 'Berhasil Menambah Wisata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Wisata::findOrFail($id);

        return view('pages.admin.wisata.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi_url' => 'required|string',
            'jam_buka' => 'nullable|date_format:H:i',
            'jam_tutup' => 'nullable|date_format:H:i',
            'harga_tiket' => 'nullable|integer',
            'link_youtube' => 'nullable|string',
            'hari_awal' => "nullable|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu",
            'hari_akhir' => "nullable|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu",
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
        ];

        $this->validate($request, $rules, $customMessages);

        $item = Wisata::findOrFail($id);

        $foto = array();

        if ($request->file('foto')) {
            foreach ($request->file('foto') as $value) {
                $extension = $value->extension();
                $imageNames = uniqid('img_', microtime()) . '.' . $extension;
                Storage::putFileAs('public/images/gambar-wisata', $value, $imageNames);
                $thumbnailpath = storage_path('app/public/images/gambar-wisata/' . $imageNames);
                Image::make($thumbnailpath)->resize(800, 600)->save($thumbnailpath);
                $foto[] = $imageNames;
            }
        } else {
            # code...
        }

        $item->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'harga_tiket' => $request->harga_tiket,
            'link_youtube' => $request->link_youtube,
            'lokasi_url' => $request->lokasi_url,
            'hari_awal' => $request->hari_awal,
            'hari_akhir' => $request->hari_akhir,
        ]);

        if ($request->file('foto')) {
            $item2 = WisataFoto::where('wisata_id', $id)->get();

            foreach ($item2 as $value) {
                $filename  = ('public/images/gambar-wisata/').$value->foto;
                Storage::delete($filename);
            }

            WisataFoto::where('wisata_id', $id)->delete();

            foreach ($foto as $value) {
                WisataFoto::create([
                    'wisata_id' => $id,
                    'foto' => $value
                ]);
            }
        }

        return redirect()->route('data-wisata.index')->with('success', 'Berhasil Mengubah Wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Wisata::findOrFail($id);

        $item2 = WisataFoto::where('wisata_id', $id)->get();

        foreach ($item2 as $value) {
            $filename  = ('public/images/gambar-wisata/').$value->foto;
            Storage::delete($filename);
        }

        WisataFoto::where('wisata_id', $id)->delete();

        $item->delete();

        return redirect()->route('data-wisata.index')->with('success', 'Berhasil Menghapus Wisata');
    }

    public function cetak($slug)
    {
        $item = Wisata::where('slug', $slug)->first();

        return view('pages.admin.wisata.print', compact('item'));
    }
}
