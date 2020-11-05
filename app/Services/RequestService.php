<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class RequestService
{
    public function get($url){
        $response = Http::get($url);
        if ($response->ok()){
            return $response->json();
        }
        return false;
    }

}
