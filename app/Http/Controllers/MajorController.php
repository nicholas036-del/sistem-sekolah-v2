<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Jurusan';
        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        return view('majors.index', compact('title', 'majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Jurusan';

        return view('majors.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Menambah data jurusan baru';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Jurusan';
        $major = [
            'id' => $id,
            'code' => 'TKJ',
            'name' => 'Teknik Komputer dan Jaringan',
            'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
        ];

        return view('majors.show', compact('title', 'major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Jurusan';
        $major = [
            'id' => $id,
            'code' => 'TKJ',
            'name' => 'Teknik Komputer dan Jaringan',
            'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
        ];

        return view('majors.edit', compact('title', 'major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Mengubah data jurusan dengan ID: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus data jurusan dengan ID: {$id}";
    }
}
