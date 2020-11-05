<?php


namespace App\Repositories;

use App\Models\Rate;
use App\Repositories\Contracts\RateRepository as RateRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RateRepository implements RateRepositoryInterface
{

    public function find_by_date_and_currency_id($date, $currency_id)
    {
        return Rate::where('date', $date)->where('currency_id', $currency_id)->first();
    }

    public function store($data)
    {
        Rate::create($data);
    }

    public function last_added()
    {
        return Rate::orderBy('date', 'desc')->first();
    }


    public function get_last_all($limit)
    {
        return DB::table('currencies')->
        join('rates', 'currencies.id', '=', 'rates.currency_id')->
        select(['currencies.id', 'currencies.name', 'rates.rate', 'rates.date'])->
        where('rates.date', '=', DB::table('rates')->max('date'))->
        paginate($limit);
    }
}
