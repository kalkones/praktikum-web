<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nidn', 'nama', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }
}