<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'user_id',
        'major_id',
        'class_id',
    ];

    /**
     * Relasi balik ke User (akun login siswa ini).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Major (jurusan).
     */
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    /**
     * Relasi ke SchoolClass (kelas).
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}