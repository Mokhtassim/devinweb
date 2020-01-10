@extends('default')
@section('content')
    <h1 class="text-center">Select City and Number of Days</h1>
    <div class="container text-center mt-3">
        <form action="/api/city/{city_id}/delivery-dates-times/{number_of_days_to_get}" method="post">
            @csrf
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Select City</label>
            <select class="browser-default">
                <option selected>City</option>
                @foreach($data as $city)
                <option name="city_id" value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Number of Days</label>
                <div class="col-10">
                    <input name="number_of_days_to_get" class="form-control" type="number" value="1" id="example-number-input">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Get Delivery Dates Times</button>
        </form>


    </div>
@endsection