@extends('default')
@section('content')
    <h1 class="text-center">Exclude some city delivery times span from some delivery dates</h1>
    <div class="container text-center mt-3">
        <form action="" method="POST">
            @csrf
            @foreach($data['delivery_times'] as $delivery_time)

                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" value="{{$delivery_time->id}}" name="delivery_times_span_id[]">
                    <label class="form-check-label" for="exampleCheck1">{{$delivery_time->span}}</label>
                </div>
            @endforeach
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="exclude">Exclude city delivery times by delivery times</button>
            </div>
        </form>
        @if(isset($data['delivery_dates']))
            <h2 class="text-center">Delivery Times selected:   </h2>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">City</th>
                    <th scope="col">Delivery date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['delivery_dates'] as $delivery_date)
                    <tr>
                        <th scope="row">{{$delivery_date->name}}</th>
                        <td>{{$delivery_date->date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
@endsection