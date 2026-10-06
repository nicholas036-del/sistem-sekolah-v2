<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentController extends Controller
{
    private const SCHOOL_CLASSES = [
        '10 AKL', '10 BID', '10 TKJ 1', '10 TKJ 2',
        '11 AKL', '11 TKJ 1', '11 TKJ 2',
        '12 AKL', '12 BID', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3',
    ];

    private const MAJORS = ['AKL', 'BID', 'TKJ'];

    public function index(Request $request): View
    {
        $students = Student::select(['id', 'nis', 'name', 'gender', 'class', 'major'])
            ->when($request->query('search'), function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($request->query('class'), fn ($query, $class) => $query->where('class', $class))
            ->when($request->query('major'), fn ($query, $major) => $query->where('major', $major))
            ->paginate(10)
            ->withQueryString();

        return view('students.index', [
            'title' => 'Sistem Sekolah - Daftar Siswa',
            'students' => $students,
            'schoolClasses' => self::SCHOOL_CLASSES,
            'majors' => self::MAJORS,
        ]);
    }

    public function create(): View
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah - Tambah Siswa',
            'schoolClasses' => self::SCHOOL_CLASSES,
            'majors' => self::MAJORS,
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $data = $request->validated();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['nis'] . '@ski.sch.id',
                'password' => bcrypt($data['nis']),
                'role' => 'student',
            ]);

            Student::create($data + ['user_id' => $user->id]);
        });

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Student $student): View
    {
        return view('students.show', [
            'title' => 'Sistem Sekolah - Detail Siswa',
            'student' => $student,
        ]);
    }

    public function edit(Student $student): View
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah - Edit Siswa',
            'student' => $student,
            'schoolClasses' => self::SCHOOL_CLASSES,
            'majors' => self::MAJORS,
        ]);
    }

    public function update(UpdateRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil dihapus.');
    }
}