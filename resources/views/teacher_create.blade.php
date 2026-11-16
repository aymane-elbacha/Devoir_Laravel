@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Ajouter un enseignant</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/teachers" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Nom : <input type="text" name="nom" value="{{ old('nom') }}"></p>
        <p>Prénom : <input type="text" name="prenom" value="{{ old('prenom') }}"></p>
        <p>Email : <input type="email" name="email" value="{{ old('email') }}"></p>
        <p>Matière : <input type="text" name="matiere" value="{{ old('matiere') }}"></p>
        <p>Photo : <input type="file" name="photo"></p>
        <button type="submit">Enregistrer</button>
        <a href="/teachers">Annuler</a>
    </form>
</div>
@endsection