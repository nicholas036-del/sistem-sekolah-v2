<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolClassController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Kelas';
        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major' => 'AKL',
                'homeroom_teacher' => 'Budi Santoso',
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major' => 'TKJ',
                'homeroom_teacher' => 'Siti Aminah',
            ],
        ];

        return view('classes.index', compact('title', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Kelas';
        $majors = $this->majors();
        $teachers = $this->teachers();

        return view('classes.create', compact('title', 'majors', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Menambah data kelas baru';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Kelas';
        $class = [
            'id' => $id,
            'name' => 'XII AKL 1',
            'grade' => 'XII',
            'major' => 'AKL',
            'homeroom_teacher' => 'Budi Santoso',
        ];

        return view('classes.show', compact('title', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Kelas';
        $class = [
            'id' => $id,
            'name' => 'XII AKL 1',
            'grade' => 'XII',
            'major' => 'AKL',
            'homeroom_teacher' => 'Budi Santoso',
        ];
        $majors = $this->majors();
        $teachers = $this->teachers();

        return view('classes.edit', compact('title', 'class', 'majors', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Mengubah data kelas dengan ID: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus data kelas dengan ID: {$id}";
    }

    /**
     * Get the dummy major options.
     *
     * @return array<int, array{id: int, code: string, name: string, description: string}>
     */
    private function majors(): array
    {
        return [
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
    }

    /**
     * Get the dummy teacher options.
     *
     * @return array<int, array{id: int, name: string}>
     */
    private function teachers(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Budi Santoso',
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah',
            ],
        ];
    }
}
