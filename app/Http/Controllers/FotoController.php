<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = Foto::all();

        return view("foto.index", compact("fotos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();

        return view("foto.create")->with("albums",$albums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = $request->album;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $insertFoto = new Foto();
        $insertFoto->album_id = $album;
        $insertFoto->judul = $judul;
        $insertFoto->tanggal_unggah = date("Y-m-d");

        if (!empty($deskripsi)) {
            $insertFoto->deskripsi = $deskripsi;
        }

        if($request->hasFile("foto"))
        {

        $foto = $request->file("foto");
        $namaFotoBaru = date("Y_m_d_H_i_s").".".$foto->getClientOriginalExtension();

        $foto->storeAs("/foto", $namaFotoBaru, "public");
        $insertFoto->lokasi_file = "foto/{$namaFotoBaru}";
    }
    $insertFoto->save();

    return redirect()->route("foto.index");

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
        $albums = Album::all();

        $foto = Foto::where("id", "=", $id)->first();

        $data = [
            "albums" => $albums,
            "foto" => $foto
        ];
        return view("foto.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = $request->album;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $updateFoto = [
            "album_id" =>$album,
            "judul" => $judul,
        ];

    if (!empty($deskripsi)) {
        $updateFoto["deskripsi"] = $deskripsi;
    }

    if ($request->hasFile("foto"))
    {
        $foto = $request->file("foto");
        if ($foto->isValid()) {
            $this->deleteFileFoto($id);
            $namaFotoBaru = date("Y_m_d_H_i_s") .".". $foto->getClientOriginalExtension();
            $foto->storeAs("/foto", $namaFotoBaru, "public");
            $updateFoto["lokasi_file"]= "foto/{namaFotoBaru}";
    }
}
Foto::where("id", "=", $id)->update($updateFoto);

return redirect()->route("foto.index");
    }
    private function deleteFileFoto(string $id) {
        $foto = Foto::where("id", $id)->first();
        if (Storage::disk("public")->exists($foto->lokasi_file))
        {
            Storage::disk("public")->delete($foto->lokasi_file);
        }
    }

    public function destroy(string $id)
    {
        $foto = Foto::where("id", $id)->first();

        // panggil fungsi delete file foto
        $this->deleteFileFoto($id);

        $foto->delete();

        return redirect()->route("foto.index");
    }
}
