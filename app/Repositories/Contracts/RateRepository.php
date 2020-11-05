<?php


namespace App\Repositories\Contracts;


interface RateRepository
{

    public function find_by_date_and_currency_id($date, $currency_id);
    public function store($data);
    public function last_added();
    public function get_last_all($limit);
}
