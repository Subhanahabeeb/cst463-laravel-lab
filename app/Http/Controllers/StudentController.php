<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        return view('students.create');
    }

    // Save student details
    public function store(Request $request)
{
    $data = $request->validate([
        'roll_no' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'department' => 'nullable',
        'semester' => 'nullable|integer',
        'cgpa' => 'nullable|numeric',
    ]);

    Student::create($data);

    return redirect()->route('students.index')
        ->with('status', 'Student added successfully!');
}
    // Display individual student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}