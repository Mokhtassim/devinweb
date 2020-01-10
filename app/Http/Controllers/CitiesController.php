<?php
namespace App\Http\Controllers;
use App\City;
use App\Delivery_date;
use App\Delivery_times_span;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    // Create a city
    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|string|min:2',
            'slug' => 'required|string|min:2'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $city = City::create([
            'name' => $input['name'],
            'slug' => $input['slug']
         ]);
        if($city == true)
        {
            return 'Create a city in Success';
        }

    }
    // Form Create a city
    public function formcreatecity(Request $request)
    {
        return view('cities.create');

    }
    //Get cities
    public function getCities()
    {
        $data = City::all();
        return view('cities.index',['data' => $data]);
    }
    //Form Attach city delivery times
    public function formAttachCityDeliverytimes($id)
    {
        $data['city'] = City::where('id',$id)->get();
        $data['delivery_times'] = Delivery_times_span::all();
        //var_dump($data);die();
        return view('cities.attachDeliveryTime',['data' => $data]);

    }
    //Attach city delivery times
    public function attachCityDeliverytimes(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'city_id' => 'required',
            'delivery_times_span_id' => 'required'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        foreach ($input["delivery_times_span_id"] as $span_id)
        {  $data[] = ['city_id' => $input["city_id"], 'delivery_times_span_id' => $span_id];
            }


       $attach = DB::table('city_delivery_times_span')->insert($data);
        if($attach == true)
        {
            return 'Attach city delivery times in Success';
        }

    }
    //exclude city delivery times by delivery dates
    public function excludeCityDeliverytimes(Request $request)
    {
        if ($request->has('exclude'))
        {
            $input = $request->all();
            $validator = Validator::make($input, [
                'date_1' => 'required',
                'date_2' => 'required'
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $data['date_1'] = $input['date_1'];
            $data['date_2'] = $input['date_2'];
            $delivery_dates = Delivery_date::whereBetween('date', [$data['date_1'], $data['date_2']])
                ->select('city_id')->distinct('city_id')->get();



            foreach ($delivery_dates as $delivery_date)
            {
                    $cities[]=$delivery_date["city_id"];

            }




            foreach ($cities as $city)
            {

                $delivery_time[] = DB::table('city_delivery_times_span')
                    ->join('cities', 'city_delivery_times_span.city_id', '=', 'cities.id')
                    ->join('delivery_times_spans', 'city_delivery_times_span.delivery_times_span_id', '=', 'delivery_times_spans.id')
                    ->select('cities.name','delivery_times_spans.span')
                    ->distinct('cities.id')
                    ->where('cities.id', '=', $city)
                    ->get();
            }
            $data['delivery_times'] = $delivery_time;
            return view('cities.exclude-by-delivery-dates',['data' => $data]);


        }
        return view('cities.exclude-by-delivery-dates');

    }
    //Exclude a city delivery date by excluding all of the daily delivery times
    public function excludeCityDeliverydates(Request $request)
    {
        $data['delivery_times'] = Delivery_times_span::all();
        if ($request->has('exclude'))
        {
            $input = $request->all();
            $validator = Validator::make($input, [
                'delivery_times_span_id' => 'required'
            ]);
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $data['delivery_dates'] = DB::table('city_delivery_times_span')
                ->join('delivery_times_spans', 'city_delivery_times_span.delivery_times_span_id', '=', 'delivery_times_spans.id')
                ->join('cities', 'city_delivery_times_span.city_id', '=', 'cities.id')
                ->join('delivery_dates', 'cities.id', '=', 'delivery_dates.city_id')
                ->select('cities.name','delivery_dates.date')
                ->distinct('cities.id')
                ->where('delivery_times_spans.id', '=', $input['delivery_times_span_id'])
                ->get();
            //var_dump($data['delivery_dates']);die();

            return view('cities.exclude-by-delivery-times',['data' =>$data]);

        }
        return view('cities.exclude-by-delivery-times',['data' =>$data]);

    }
    //Form selected cities and numbers days
    public function formCityDeliverydatesNumbers()
    {
        $data = City::all();
        return view('cities.city-delivery-date-numbers-day',['data' => $data]);
    }
    //selected cities and numbers days
    public function getCityDeliverydatesNumbers($city_id,$number_of_days_to_get, Request $request)
    {
        $input = $request->all();
        var_dump($input);die();
    }


}