@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Liste des étudiants</h2>
    <p><a href="/students/create">+ Ajouter un étudiant</a></p>

    <table border="1" cellpadding="8" style="border-collapse:collapse; width:800px;">
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>
                @if($student->photo)
                    <img src="/image/{{ $student->photo }}" width="60" height="60">
                @endif
            </td>
            <td>{{ $student->nom }}</td>
            <td>{{ $student->prenom }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <a href="/students/{{ $student->id }}/edit">Modifier</a>
                <form action="/students/{{ $student->id }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Supprimer cet étudiant ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection