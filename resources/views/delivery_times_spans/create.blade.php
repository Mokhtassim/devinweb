@extends('default')
@section('content')
    <h1 class="text-center">Create delivery time span</h1>
    <div class="container">
        <form action={{route('create-delivery-times')}} method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Span</label>
                <input type="text" class="form-control" name="span" required/>
            </div>

            <button type="submit" class="btn btn-primary">Create delivery times span</button>
        </form>
    </div>
@endsection