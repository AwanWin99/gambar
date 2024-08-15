<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();

        $data = [
            "albums" => $albums
        ];

        return view("album.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("album.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_album = $request->nama_album;
        $deskripsi = $request->deskripsi;
        $tanggal_dibuat = $request->tanggal_dibuat;

        $dataAlbum = new Album();
        $dataAlbum->nama_album = $nama_album;
        $dataAlbum->deskripsi = $deskripsi;
        $dataAlbum->tanggal_dibuat = $tanggal_dibuat;
        $dataAlbum->save();

        return redirect()->route("album.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::where("id", $id)->first();

        $data = [
            "album" => $album
        ];
        return view("album.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $nama_album = $request->nama_album;
            $deskripsi = $request->deskripsi;
            $tanggal_dibuat = $request->tanggal_dibuat;

            Album::where("id", $id)->update([
                "nama_album" => $nama_album,
                "deskripsi" => $deskripsi,
                "tanggal_dibuat" => $tanggal_dibuat,
            ]);
            return redirect("/album");
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::where("id", $id)->first();
        $album->delete();

        return redirect("/album");
    }
}
