@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Ajouter un étudiant</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/students" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Nom : <input type="text" name="nom" value="{{ old('nom') }}"></p>
        <p>Prénom : <input type="text" name="prenom" value="{{ old('prenom') }}"></p>
        <p>Email : <input type="email" name="email" value="{{ old('email') }}"></p>
        <p>Photo : <input type="file" name="photo"></p>
        <button type="submit">Enregistrer</button>
        <a href="/students">Annuler</a>
    </form>
</div>
@endsection
