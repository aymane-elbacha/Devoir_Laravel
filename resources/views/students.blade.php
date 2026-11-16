@extends('layout')
@section('content')
<div style="margin:50px;">
    <h2>Liste des étudiants</h2>
    <table border="1" cellpadding="8" style="border-collapse:collapse; width:800px;">
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>
                @if($student->photo)
                    <img src="/image/{{ $student->photo }}" width="60" height="60">
                @endif
            </td>
            <td>{{ $student->nom }}</td>
            <td>{{ $student->prenom }}</td>
            <td>{{ $student->email }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection