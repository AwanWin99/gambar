<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class album extends Model
{
    use HasFactory;

    public $table = "master.albums";

    protected $fillable = [
        "id",
        "nama",
        "desktipsi",
        "tanggal_dibuat",
    ];

    public function foto(): HasMany{
        return $this->hasMany(Foto::class, "album_id", "id");
    }
}
