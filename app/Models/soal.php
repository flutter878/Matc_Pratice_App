<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';
    public $timestamps = false; // karena di migration tidak ada created_at & updated_a

    protected $fillable = [
        'teks_soal',
        'jawaban_benar',
    ];

    // Relasi: satu soal punya banyak pilihan
    public function pilihan()
    {
        return $this->hasMany(Pilihan::class, 'id_soal', 'id_soal');
    }

    // Relasi: satu soal bisa punya banyak hasil (jawaban user)
    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_soal', 'id_soal');
    }
}
