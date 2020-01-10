@extends('default')
@section('content')
    <h1 class="text-center">Exclude some city delivery times span from some delivery dates</h1>
    <div class="container text-center mt-3">
        <form action="" method="POST">
            @csrf
            <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Date 1</label>
                <div class="col-10">
                    <input name="date_1" class="form-control" type="date" id="example-date-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Date 2</label>
                <div class="col-10">
                    <input name="date_2" class="form-control" type="date" id="example-date-input" required>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="exclude">Exclude city delivery times by delivery dates</button>
            </div>
        </form>
        @if(isset($data))
            <h2 class="text-center">Delivery Dates selected: {{$data['date_1']}} , {{$data['date_2']}}  </h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">City</th>
                        <th scope="col">Delivery time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['delivery_times'] as $delivery_time)
                    <tr>
                        <th scope="row">{{$delivery_time[0]->name}}</th>
                        @foreach($delivery_time as $span)
                        <td>{{$span->span}}</td>
                         @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>

        @endif
    </div>
@endsection