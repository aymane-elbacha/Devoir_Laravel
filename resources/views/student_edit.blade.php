@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Modifier un étudiant</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/students/{{ $student->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>Nom : <input type="text" name="nom" value="{{ old('nom', $student->nom) }}"></p>
        <p>Prénom : <input type="text" name="prenom" value="{{ old('prenom', $student->prenom) }}"></p>
        <p>Email : <input type="email" name="email" value="{{ old('email', $student->email) }}"></p>
        <p>
            Photo :
            @if($student->photo)
                <img src="/image/{{ $student->photo }}" width="60" height="60">
            @endif
            <input type="file" name="photo">
        </p>
        <button type="submit">Mettre à jour</button>
        <a href="/students">Annuler</a>
    </form>
</div>
@endsection
