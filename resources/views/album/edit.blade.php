@extends('layout')

@section('content')
    <h1>Edit Album</h1>

    <form action=" {{ route('album.update', $album->id) }}" method="post">
        @method('put')
        @csrf
        <div>
            <label for="nama_album">Nama Album</label>
            <input type="text" name="nama_album" id="nama_album" placeholder="Aktifitas" value="{{ $album->nama_album }}" required>
        </div>
        <br>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" required>{{ $album->deskripsi }}</textarea>
        </div>
        <br>
        <div>
            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="date" name="tanggal_dibuat" id="tanggal_dibuat" placeholder="Tanggal Dibuat" value="{{ $album->tanggal_dibuat }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection

