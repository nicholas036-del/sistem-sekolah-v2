<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $students = $this->students();

        return view('students.index', compact('title', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Menambah data siswa baru';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        $student = $this->findStudent($id);

        return view('students.show', compact('title', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        $student = $this->findStudent($id);

        return view('students.edit', compact('title', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Mengubah data siswa dengan ID: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }

    /**
     * Get the dummy student records.
     *
     * @return array<int, array{id: int, nis: string, name: string, class: string, major: string}>
     */
    private function students(): array
    {
        return [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII AKL 1',
                'major' => 'AKL',
            ],
            [
                'id' => 3,
                'nis' => '1004',
                'name' => 'Britney',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
            ],
        ];
    }

    /**
     * Find a student record by id, defaulting to the first record.
     *
     * @return array{id: int, nis: string, name: string, class: string, major: string}
     */
    private function findStudent(string $id): array
    {
        $student = collect($this->students())->firstWhere('id', (int) $id);

        return $student ?? $this->students()[0];
    }
}
