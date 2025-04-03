<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::when($request->college, function ($query) use ($request) {
                return $query->where('college_id', $request->college);
            })
            ->when($request->sort == 'name', function ($query) {
                return $query->orderBy('name');
            })
            ->get();

        $colleges = College::all();
        return view('students.index', compact('students', 'colleges'));
    }

    public function create()
    {
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $colleges = College::all();
        return view('students.edit', compact('student', 'colleges'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
