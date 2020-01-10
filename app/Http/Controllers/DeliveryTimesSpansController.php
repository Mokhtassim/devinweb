<?php
namespace App\Http\Controllers;
use App\Delivery_times_span;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DeliveryTimesSpansController extends Controller
{
    // Create a delivery times span
    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'span' => 'required|string|min:2'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $city = Delivery_times_span::create(['span' => $input['span']]);
        if($city == true)
        {
            return 'Create delivery times span in Success';
        }

    }
    // Form Create delivery times span
    public function formcreatedeliverytime(Request $request)
    {
        return view('delivery_times_spans.create');

    }

}