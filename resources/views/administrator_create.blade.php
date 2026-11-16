@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Ajouter un administrateur</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/administrators" method="POST">
        @csrf
        <p>Nom : <input type="text" name="nom" value="{{ old('nom') }}"></p>
        <p>Prénom : <input type="text" name="prenom" value="{{ old('prenom') }}"></p>
        <p>Email : <input type="email" name="email" value="{{ old('email') }}"></p>
        <p>Poste : <input type="text" name="poste" value="{{ old('poste') }}"></p>
        <button type="submit">Enregistrer</button>
        <a href="/administrators">Annuler</a>
    </form>
</div>
@endsection