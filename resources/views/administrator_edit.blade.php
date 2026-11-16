@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Modifier un administrateur</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/administrators/{{ $administrator->id }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nom : <input type="text" name="nom" value="{{ old('nom', $administrator->nom) }}"></p>
        <p>Prénom : <input type="text" name="prenom" value="{{ old('prenom', $administrator->prenom) }}"></p>
        <p>Email : <input type="email" name="email" value="{{ old('email', $administrator->email) }}"></p>
        <p>Poste : <input type="text" name="poste" value="{{ old('poste', $administrator->poste) }}"></p>
        <button type="submit">Mettre à jour</button>
        <a href="/administrators">Annuler</a>
    </form>
</div>
@endsection
