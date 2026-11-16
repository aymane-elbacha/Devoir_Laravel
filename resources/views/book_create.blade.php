@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Ajouter un livre</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/books" method="POST">
        @csrf
        <p>Titre : <input type="text" name="titre" value="{{ old('titre') }}"></p>
        <p>Auteur : <input type="text" name="auteur" value="{{ old('auteur') }}"></p>
        <p>Catégorie : <input type="text" name="categorie" value="{{ old('categorie') }}"></p>
        <p>Quantité : <input type="number" name="quantite" min="0" value="{{ old('quantite', 1) }}"></p>
        <button type="submit">Enregistrer</button>
        <a href="/books">Annuler</a>
    </form>
</div>
@endsection