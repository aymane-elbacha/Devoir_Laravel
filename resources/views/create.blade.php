@extends('layout')
@section('content')

<h3>Add Student</h3>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
</div>
<div class="form-group">
    <label>Phone:</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" />
</div>
<div class="form-group">
    <label>Section:</label>
    <input type="text" class="form-control" name="section" value="{{ old('section') }}" />
</div>
<div class="form-group">
    <label>Image:</label>
    <input type="file" class="form-control" name="image" />
</div>
<button type="submit" class="btn btn-primary">Add Student</button>
</form>

@endsection