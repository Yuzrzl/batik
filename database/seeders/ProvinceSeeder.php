<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
        'key'=>'7ad9c26844ba56236dc98a2fc10814da'
       ])->get('https://api.rajaongkir.com/starter/province');

       $provinces = $response['rajaongkir']['results'];
       foreach ($provinces as $province ) {
        $data_province[]= [
            'id' => $province['province_id'],
            'province' => $province['province'],
        ];
       }

       Province::insert($data_province);
    }
}
