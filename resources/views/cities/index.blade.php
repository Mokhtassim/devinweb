@extends('default')
@section('content')
    <h1 class="text-center">All Cities</h1>
    <div class="container text-center mt-3">
    @foreach($data as $city)
        <a href="{{ route('formAttach-city-delivery-times', ['city_id' => $city->id])}}" class="btn btn-primary">Attach {{$city->name}} delivery times </a>
    @endforeach
    </div>
@endsection