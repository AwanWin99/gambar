@extends('layout')

@section('content')
    <h1>Edit Foto</h1>
    <a href="{{ route('foto.index') }}">Kembali Ke Tampilan Utama</a>
    <form action="{{ route('foto.update', $foto->id) }}" method=post enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="album">Album</label>
            <select name="album" id="album" required>
            <option value="">Pilih Album</option>
            @foreach($albums as $album)
            @php
                $selected = $album->id == $foto->album_id ? "Selected" : "";
            @endphp
                <option value="{{ $album->id }}" {{ $selected }}>{{ $album->nama_album }}</option>
            @endforeach
</select>
        </div>
        <br>
        <div>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" placeholder="Judul Foto" value="{{ $foto->judul }}" required>
        </div>
        <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" value="{{ $foto->deskripsi }}" required></textarea>
        </div>
        <img src="{{ asset("storage/{$foto->lokasi_file}") }}" alt="{{ $foto->judul }}" width="30%" />
        <br>
        <div>
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/" required>
        </div>
        <div>
        <button type="submit">Simpan</button>
</div>
    </form>
@endsection