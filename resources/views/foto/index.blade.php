@extends('layout')

@section('content')
<h1>Foto</h1>
<a href="{{route('foto.create') }}">Tambah</a>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <td>Id</td>
            <td>Nama Album</td>
            <td>Judul</td>
            <td>Deskripsi</td>
            <td>Tanggal Dibuat</td>
            <td>Foto</td>
            <td>Opsi</td>
</tr>
</thead>
<tbody>
@php
    $no = 1;
@endphp
@forelse($fotos as $foto)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $foto->album->nama_album }}</td>
    <td>{{ $foto->judul }}</td>
    <td>{{ $foto->deskripsi }}</td>
    <td>{{date ("d-m-Y", strtotime($foto->tanggal_unggah)) }}</td>
    <td><img src="{{ asset("storage/{$foto->lokasi_file}") }}" alt="{{ $foto->judul }}" width="40%" /></td>
    <td>
            <a href="{{ route('foto.edit',$foto->id) }}">Edit</a>
        ||
        <form action="{{ route('foto.destroy',$foto->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Hapus</button>
</form>
</td>
</tr>
@empty
<tr>
    <td colspan="7">Tidak Terdapat Data Foto!</td>
    @endforelse
</tbody>
</table>
@endsection