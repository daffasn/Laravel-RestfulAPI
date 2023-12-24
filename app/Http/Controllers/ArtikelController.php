<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Resources\ArtikelResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Artikel::with('user:id,name')->get();

        return ArtikelResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'kategori' => 'required'
        ]);


        $file = null;
        $fileName = null;
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();

            Storage::putFileAs('photos', $file, $fileName);
        }

        $post = Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'gambar' => $fileName,
            'user_id' => Auth::id(),
        ]);

        return new ArtikelResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        $post = Artikel::with('user:id,name,email')->findOrFail($artikel->id);

        return new ArtikelResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'kategori' => 'required'
        ]);

        $file = null;
        $fileName = null;
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();

            Storage::putFileAs('photos', $file, $fileName);
        }

        $post = Artikel::findOrFail($artikel->id);
        $post->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'gambar' => $fileName,
            'user_id' => Auth::id()
        ]);

        return new ArtikelResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $post = Artikel::findOrFail($artikel->id);
        $post->delete();

        return new ArtikelResource($post);
    }

    public function pembaca()
    {
        return view('pembaca');
    }
}
