@extends('layout')
@section('content')

<h3>Edit Student</h3>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}" />
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="text" class="form-control" name="email" value="{{ old('email', $student->email) }}" />
</div>
<div class="form-group">
    <label>Phone:</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone', $student->phone) }}" />
</div>
<div class="form-group">
    <label>Section:</label>
    <input type="text" class="form-control" name="section" value="{{ old('section', $student->section) }}" />
</div>
<div class="form-group">
    <label>Image:</label><br>
    <img src="/image/{{ $student->image }}" width="80" height="80">
    <input type="file" class="form-control" name="image" />
</div>
<button type="submit" class="btn btn-primary">Update Student</button>
</form>

@endsection