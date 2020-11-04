<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\CurrencyService;
use Illuminate\Support\Arr;

class CurrencyController extends Controller
{

    private $currencyService;

    /**
     * CurrencyController constructor.
     * @param CurrencyService $currencyService
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index(Request $request)
    {
        $limit = Arr::get($request->all(),'limit', 15);
        return response()->json($this->currencyService->get_all($limit));
    }

    public function show(Request $request, $id)
    {
        return response()->json($this->currencyService->get_by_id($id));
    }
}
