@extends('layout')

@section('content')
    <h1>Tambah Foto</h1>
    <a href="{{ route('foto.index') }}">Kembali Ke Tampilan Utama</a>
    <form action="{{ route('foto.store') }}" method=post enctype="multipart/form-data">
        @csrf
        <div>
            <label for="album">Album</label>
            <select name="album" id="album" required>
            <option value="">Pilih Album</option>
            @foreach($albums as $album)
                <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
            @endforeach
</select>
        </div>
        <br>
        <div>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" placeholder="Judul Foto" required>
        </div>
        <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" required></textarea>
        </div>
        <br>
        <div>
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection