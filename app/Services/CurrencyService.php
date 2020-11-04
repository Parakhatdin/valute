<?php


namespace App\Services;

use App\Services\Contracts\CurrencyService as CurrencyServiceInterface;

class CurrencyService implements CurrencyServiceInterface
{

    public function get_all($limit)
    {
        return "get_all: ".$limit;
    }

    public function get_by_id($id)
    {
        return "get_by_id: ".$id;
    }
}
