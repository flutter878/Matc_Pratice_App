<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    protected $table = 'hasil';
    protected $primaryKey = 'id_hasil';
    public $timestamps = false; // pakai dibuat_pada bukan created_at

    protected $fillable = [
        'id_soal',
        'jawaban_dipilih',
        'benar',
        'dibuat_pada',
    ];

    // Relasi: hasil milik satu soal
    public function soal()
    {
        return $this->belongsTo(Soal::class, 'id_soal', 'id_soal');
    }
}
