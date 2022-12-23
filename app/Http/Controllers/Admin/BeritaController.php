<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Berita::latest()->get();

        return view('pages.admin.berita.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.berita.create');
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
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'image' => 'Field :attribute harus berupa gambar',
            'mimes' => 'Field :attribute harus ekstensi jpeg / jpg / png',
        ];

        $this->validate($request, $rules, $customMessages);

        $value = $request->file('thumbnail');
        $extension = $value->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/images/berita-thumbnail', $value, $imageNames);
        $thumbnailpath = storage_path('app/public/images/berita-thumbnail/' . $imageNames);
        Image::make($thumbnailpath)->resize(800, 600)->save($thumbnailpath);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'isi' => $request->isi,
            'thumbnail' => $imageNames
        ]);

        return redirect()->route('data-berita.index')->with(['success' => 'Berhasil Menambah Berita']);
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
        $item = Berita::findOrFail($id);

        return view('pages.admin.berita.edit', [
            'item' => $item
        ]);
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
        $rules1 = [
            'judul' => 'required|string|max:50',
            'isi' => 'required|string'
        ];

        $rules2 = [
            'thumbnail' => 'image|mimes:jpeg,png,jpg',
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'image' => 'Field :attribute harus berupa gambar',
            'mimes' => 'Field :attribute harus ekstensi jpeg / jpg / png',
        ];

        $this->validate($request, $rules1, $customMessages);

        if ($request->thumbnail) {
            $this->validate($request, $rules2, $customMessages);
        }

        $item = Berita::findOrFail($id);

        if($request->file('thumbnail')){
            $filename  = ('public/images/berita-thumbnail/').$item->thumbnail;
            Storage::delete($filename);

            $value = $request->file('thumbnail');
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/images/berita-thumbnail', $value, $imageNames);
            $thumbnailpath = storage_path('app/public/images/berita-thumbnail/' . $imageNames);
            Image::make($thumbnailpath)->resize(800, 600)->save($thumbnailpath);
        }else {
            $imageNames = $item->thumbnail;
        }

        $item->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'isi' => $request->isi,
            'thumbnail' => $imageNames
        ]);

        return redirect()->route('data-berita.index')->with(['success' => 'Berhasil Mengubah Berita']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berita::findOrFail($id);

        $filename = ('public/images/berita-thumbnail/').$item->thumbnail;
        Storage::delete($filename);

        $item->delete();

        return redirect()->route('data-berita.index')->with(['success' => 'Berhasil Menghapus Berita']);
    }
}
