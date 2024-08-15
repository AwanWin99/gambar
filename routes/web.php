<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
route::resource("/foto", FotoController::class);

route::get("/album", [AlbumController::class, "index"])->name("album.index");
route::delete("/album/{id}", [AlbumController::class, "destroy"])->name("album.destroy");

route::get("/album/create", [AlbumController::class, "create"])->name("album.create");
route::post("/album", [AlbumController::class, "store"])->name("album.store");

route::get("/album/{id}", [AlbumController::class, "edit"])->name("album.edit");
route::put("/album/{id}", [AlbumController::class, "update"])->name("album.update");



