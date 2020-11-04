<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class RateCheckService
{
    public function check()
    {
        $data = [];
        try {
            $response = Http::get('http://cbu.uz/uz/arkhiv-kursov-valyut/json');
            $data = json_decode($response);
        } catch (\Exception $exception){
           info("from http://cbu.uz/uz/arkhiv-kursov-valyut/json can't get info");
        }
        info($data);
    }
}
