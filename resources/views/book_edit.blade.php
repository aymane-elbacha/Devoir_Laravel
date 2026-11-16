@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Modifier un livre</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/books/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        <p>Titre : <input type="text" name="titre" value="{{ old('titre', $book->titre) }}"></p>
        <p>Auteur : <input type="text" name="auteur" value="{{ old('auteur', $book->auteur) }}"></p>
        <p>Catégorie : <input type="text" name="categorie" value="{{ old('categorie', $book->categorie) }}"></p>
        <p>Quantité : <input type="number" name="quantite" min="0" value="{{ old('quantite', $book->quantite) }}"></p>
        <button type="submit">Mettre à jour</button>
        <a href="/books">Annuler</a>
    </form>
</div>
@endsection