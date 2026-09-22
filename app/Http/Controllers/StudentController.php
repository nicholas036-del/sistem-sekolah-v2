<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $students = Student::select(['id', 'nis', 'name', 'gender', 'major'])
            ->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
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
        // validasi
        $validatedRequest = $request->validate([
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:L,P'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class'  => ['required', 'string'],
        ]);

        // Tambahan Data ke Database
        Student::create($validatedRequest);

        // Handle If Success
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        $student = Student::findOrFail($id)->toArray();

        return view('students.show', compact('title', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        $student = Student::findOrFail($id)->toArray();

        return view('students.edit', compact('title', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedRequest = $request->validate([
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis,' . $id],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:L,P'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class'  => ['required', 'string'],
        ]);

        // Tambahan Data ke Database
        $student = Student::findOrFail($id);
        $student->update($validatedRequest);

        // Handle If Success
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}