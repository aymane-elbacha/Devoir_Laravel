<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index()
    {
        $administrators = Administrator::all();
        return view('administrators', compact('administrators'));
    }

    public function create()
    {
        return view('administrator_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:administrators,email',
            'poste' => 'nullable',
        ]);

        Administrator::create($data);
        return redirect('/administrators');
    }

    public function edit(Administrator $administrator)
    {
        return view('administrator_edit', compact('administrator'));
    }

    public function update(Request $request, Administrator $administrator)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:administrators,email,' . $administrator->id,
            'poste' => 'nullable',
        ]);

        $administrator->update($data);
        return redirect('/administrators');
    }

    public function destroy(Administrator $administrator)
    {
        $administrator->delete();
        return redirect('/administrators');
    }
}