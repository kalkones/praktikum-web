<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs'; // penting! karena nama tabelnya "krs", bukan "kr" atau "krss"

    protected $fillable = ['mahasiswa_id', 'mata_kuliah_id', 'semester', 'tahun_ajaran'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}