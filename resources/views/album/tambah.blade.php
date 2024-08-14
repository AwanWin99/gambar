@extends('layout')

@section('content')
    <h1>Tambah Album</h1>

    <form action="{{ route('album.store') }}" method=post>
        @csrf
        <div>
            <label for="nama_album">Album</label>
            <input type="text" name="nama_album" id="nama_album" placeholder="Nama Album" required>
        </div>
        <br>
        <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" required></textarea>
        </div>
        <br>
        <div>
            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="date" name="tanggal_dibuat" id="tanggal_dibuat" placeholder="Tanggal Foto" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection