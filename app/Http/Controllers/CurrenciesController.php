<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurrenciesRequest;
use App\Http\Requests\UpdateCurrenciesRequest;

class CurrenciesController extends Controller
{

    /**
     * Display a listing of Currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();

        return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating new Currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created Currency in storage.
     *
     * @param  \App\Http\Requests\StoreCurrenciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrenciesRequest $request)
    {
        Currency::create($request->all());

        return redirect()->route('currencies.index');
    }

    /**
     * Show the form for editing Currency.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);

        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update Currency in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrenciesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrenciesRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);
        if ($request->main_currency == 1 && $request->main_currency_old == 0) {
            $currency_old_main = Currency::where('main_currency', '=', 1)->first();
            if ($currency_old_main) {
                $currency_old_main->main_currency = 0;
                $currency_old_main->save();
            }
        }
        if (!$request->main_currency) {
            $request->request->add(['main_currency' => 0]);
        }
        $currency->update($request->all());

        return redirect()->route('currencies.index');
    }

    /**
     * Remove Currency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return redirect()->route('currencies.index');
    }

    /**
     * Delete all selected Currency at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Currency::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
