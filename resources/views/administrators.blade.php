@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Liste des administrateurs</h2>
    <p><a href="/administrators/create">+ Ajouter un administrateur</a></p>

    <table border="1" cellpadding="8" style="border-collapse:collapse; width:800px;">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Poste</th>
            <th>Actions</th>
        </tr>
        @foreach($administrators as $administrator)
        <tr>
            <td>{{ $administrator->nom }}</td>
            <td>{{ $administrator->prenom }}</td>
            <td>{{ $administrator->email }}</td>
            <td>{{ $administrator->poste }}</td>
            <td>
                <a href="/administrators/{{ $administrator->id }}/edit">Modifier</a>
                <form action="/administrators/{{ $administrator->id }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Supprimer cet administrateur ?');">
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