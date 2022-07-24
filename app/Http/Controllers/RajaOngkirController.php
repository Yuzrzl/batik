<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
   public function index(Request $request)
   {
      if ($request->origin && $request->destination && $request->weight && $request->courier) {
         $origin = $request->origin;
         $destination = $request->destination;
         $weight = $request->weight;
         $courier = $request->courier;
         $cost = $request->costs;

         $response = Http::withHeaders([
            'key' => '7ad9c26844ba56236dc98a2fc10814da'
         ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
         ]);

         $cekongkir = $response['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
      } else {
         $origin = '';
         $destination = '';
         $weight = '';
         $courier = '';
         $cekongkir = null;
      }

      // $this->courier = $cost[0]['name'];
      // foreach ($cost[0]['costs']['name'] as $row ) {
      //    $this->result[] = array(
      //       'description' => $row['description'],
      //    );
      // }

      

      $provinces = Province::all();
      $cities = City::all();
      //dd($request->all());
      return view('payment.pengiriman', compact('provinces', 'cities', 'cekongkir'));

      //return $response['rajaongkir']['results'][0];

      //     $response = Http::withHeaders([
      //         'key' => '7ad9c26844ba56236dc98a2fc10814da'
      //     ])->get('https://api.rajaongkir.com/starter/city');
      //     return $response->body();
   }


   public static function getAlamat($origin, $destination, $weight, $courier){
      $response = Http::withHeaders([
         'key' => '7ad9c26844ba56236dc98a2fc10814da'
      ])->post('https://api.rajaongkir.com/starter/cost', [
         'origin' => $origin,
         'destination' => $destination,
         'weight' => $weight,
         'courier' => $courier
      ]);

      $cekongkir = $response['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
      return $cekongkir;
   }

   public function getCities($id)
   {
      $city = City::where('province_id', $id)->pluck('city_name', 'id');
      return json_encode($city);
   }
}
