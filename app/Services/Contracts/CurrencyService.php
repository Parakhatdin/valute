<?php


namespace App\Services\Contracts;


interface CurrencyService
{
    public function get_all($limit);
    public function get_by_id($id);
}
