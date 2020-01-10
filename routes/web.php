<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// City
Route::post('api/city','CitiesController@create')->name('create-city');
Route::get('/test/api/city','CitiesController@formcreatecity')->name('formcreate-city');
Route::get('/','CitiesController@getCities')->name('cities');
// Delivery Times span
Route::post('api/delivery-times','DeliveryTimesSpansController@create')->name('create-delivery-times');
Route::get('/test/api/delivery-times','DeliveryTimesSpansController@formcreatedeliverytime')->name('formcreate-delivery-times');
// Attach city delivery time
Route::get('/api/city/{city_id}/delivery-times','CitiesController@formAttachCityDeliverytimes')->name('formAttach-city-delivery-times');
Route::post('api/city/delivery-times/attach','CitiesController@attachCityDeliverytimes')->name('attach-delivery-times-city');
//Exclude some city delivery times span from some delivery dates
Route::match(['post','get'],'/api/city/delivery-times/exclude','CitiesController@excludeCityDeliverytimes')->name('exclude-city-delivery-times');
//Exclude a city delivery date by excluding all of the daily delivery times
Route::match(['post','get'],'/api/city/delivery-date/exclude','CitiesController@excludeCityDeliverydates')->name('exclude-city-delivery-dates');
// By sending the city id return all of its delivery dates times in this format (of coarse excluded delivery dates, times shouldn't be returned)
Route::get('api/city/{city_id}/delivery-dates-times/{number_of_days_to_get}','CitiesController@getCityDeliverydatesNumbers')->name('get-city-delivery-dates-numbers');




