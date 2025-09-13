<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pilihan extends Model
{
    protected $table = 'pilihan';
    protected $primaryKey = 'id_pilihan';
    public $timestamps = false;

    protected $fillable = [
        'id_soal',
        'teks_pilihan',
    ];

    // Relasi: pilihan milik satu soal
    public function soal()
    {
        return $this->belongsTo(Soal::class, 'id_soal', 'id_soal');
    }
}
