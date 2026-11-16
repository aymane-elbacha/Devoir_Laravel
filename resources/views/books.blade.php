@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Liste des livres</h2>
    <p><a href="/books/create">+ Ajouter un livre</a></p>

    <table border="1" cellpadding="8" style="border-collapse:collapse; width:800px;">
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th>Quantité</th>
            <th>Actions</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->titre }}</td>
            <td>{{ $book->auteur }}</td>
            <td>{{ $book->categorie }}</td>
            <td>{{ $book->quantite }}</td>
            <td>
                <a href="/books/{{ $book->id }}/edit">Modifier</a>
                <form action="/books/{{ $book->id }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Supprimer ce livre ?');">
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