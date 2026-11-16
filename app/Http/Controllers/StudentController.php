<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students', compact('students'));
    }

    public function create()
    {
        return view('student_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:students,email',
            'photo' => 'nullable|image',
        ]);

        if ($request->hasFile('photo')) {
            $name = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('image'), $name);
            $data['photo'] = $name;
        }

        Student::create($data);
        return redirect('/students');
    }

    public function edit(Student $student)
    {
        return view('student_edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'photo' => 'nullable|image',
        ]);

        if ($request->hasFile('photo')) {
            $name = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('image'), $name);
            $data['photo'] = $name;
        }

        $student->update($data);
        return redirect('/students');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students');
    }
}