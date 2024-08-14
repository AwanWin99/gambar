@extends('layout')

@section('content')
<h1>Edit Foto</h1>

<form action="{{ route('foto.store') }}" method="POST enctype="multipart/form-data">
@csrf
<div>
    <label for="album">Album</label>
    <section name="album" id="album" required="required">
    <option value="">Pilih Album</option>
    @foreach($albums as $album)
    <option value="{{ $album->id }}">