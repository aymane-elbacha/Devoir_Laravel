@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Modifier un enseignant</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/teachers/{{ $teacher->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>Nom : <input type="text" name="nom" value="{{ old('nom', $teacher->nom) }}"></p>
        <p>Prénom : <input type="text" name="prenom" value="{{ old('prenom', $teacher->prenom) }}"></p>
        <p>Email : <input type="email" name="email" value="{{ old('email', $teacher->email) }}"></p>
        <p>Matière : <input type="text" name="matiere" value="{{ old('matiere', $teacher->matiere) }}"></p>
        <p>
            Photo :
            @if($teacher->photo)
                <img src="/image/{{ $teacher->photo }}" width="60" height="60">
            @endif
            <input type="file" name="photo">
        </p>
        <button type="submit">Mettre à jour</button>
        <a href="/teachers">Annuler</a>
    </form>
</div>
@endsection