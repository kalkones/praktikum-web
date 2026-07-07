<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['krs_id', 'nilai_angka', 'nilai_huruf'];

    public function krs()
    {
        return $this->belongsTo(Krs::class);
    }
}