@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Liste des enseignants</h2>
    <p><a href="/teachers/create">+ Ajouter un enseignant</a></p>

    <table border="1" cellpadding="8" style="border-collapse:collapse; width:800px;">
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Matière</th>
            <th>Actions</th>
        </tr>
        @foreach($teachers as $teacher)
        <tr>
            <td>
                @if($teacher->photo)
                    <img src="/image/{{ $teacher->photo }}" width="60" height="60">
                @endif
            </td>
            <td>{{ $teacher->nom }}</td>
            <td>{{ $teacher->prenom }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->matiere }}</td>
            <td>
                <a href="/teachers/{{ $teacher->id }}/edit">Modifier</a>
                <form action="/teachers/{{ $teacher->id }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Supprimer cet enseignant ?');">
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