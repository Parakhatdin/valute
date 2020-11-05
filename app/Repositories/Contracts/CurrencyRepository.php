<?php


namespace App\Repositories\Contracts;


interface CurrencyRepository
{
    public function find($id);
    public function store($data);
    public function get_all_rates($id);
}
