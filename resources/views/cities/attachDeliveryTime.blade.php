@extends('default')
@section('content')
    <h1 class="text-center">Attach {{ $data['city'][0]->name }} delivery times</h1>
    <div class="container text-center mt-3">
        <form action={{route('attach-delivery-times-city')}} method="POST">
            @csrf
            <input type="hidden" value="{{ $data['city'][0]->id }}" name="city_id" required/>
        @foreach($data['delivery_times'] as $delivery_time)

            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" value="{{$delivery_time->id}}" name="delivery_times_span_id[]">
                <label class="form-check-label" for="exampleCheck1">{{$delivery_time->span}}</label>
            </div>
        @endforeach
            <hr>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Attach delivery times in {{ $data['city'][0]->name }}</button>
            </div>
        </form>
    </div>
@endsection