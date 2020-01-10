@extends('default')
@section('content')
    <h1 class="text-center">Create city</h1>
    <div class="container">
    <form action={{route('create-city')}} method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" required/>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control" name="slug" required/>
        </div>

        <button type="submit" class="btn btn-primary">Create city</button>
    </form>
    </div>
@endsection