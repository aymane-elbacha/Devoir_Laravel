<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers', compact('teachers'));
    }

    public function create()
    {
        return view('teacher_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'matiere' => 'required',
            'photo' => 'nullable|image',
        ]);

        if ($request->hasFile('photo')) {
            $name = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('image'), $name);
            $data['photo'] = $name;
        }

        Teacher::create($data);
        return redirect('/teachers');
    }

    public function edit(Teacher $teacher)
    {
        return view('teacher_edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'matiere' => 'required',
            'photo' => 'nullable|image',
        ]);

        if ($request->hasFile('photo')) {
            $name = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('image'), $name);
            $data['photo'] = $name;
        }

        $teacher->update($data);
        return redirect('/teachers');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teachers');
    }
}