<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private const SCHOOL_CLASSES = [
        '10 AKL', '11 AKL', '11 TKJ 1', '11 TKJ 2',
        '10 BID', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3',
        '12 AKL', '12 BID', '10 TKJ 1', '10 TKJ 2',
    ];

    private const MAJORS = ['AKL', 'BID', 'TKJ'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'gender', 'class', 'major'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn ($query, $class) => $query->where('class', $class))
            ->when($major, fn ($query, $major) => $query->where('major', $major))
            ->paginate(10)
            ->withQueryString();

        return view('students.index', [
            'title' => 'Sistem Sekolah - Daftar Siswa',
            'students' => $students,
            'schoolClasses' => self::SCHOOL_CLASSES,
            'majors' => self::MAJORS,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah - Tambah Siswa',
            'schoolClasses' => self::SCHOOL_CLASSES,
            'majors' => self::MAJORS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', [
            'title' => 'Sistem Sekolah - Detail Siswa',
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah - Edit Siswa',
            'student' => $student,
            'schoolClasses' => self::SCHOOL_CLASSES,
            'majors' => self::MAJORS,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil dihapus.');
    }
}