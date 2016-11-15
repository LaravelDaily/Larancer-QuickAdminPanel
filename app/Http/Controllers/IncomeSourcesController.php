<?php

namespace App\Http\Controllers;

use App\IncomeSource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIncomeSourcesRequest;
use App\Http\Requests\UpdateIncomeSourcesRequest;

class IncomeSourcesController extends Controller
{

    /**
     * Display a listing of IncomeSource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_sources = IncomeSource::all();

        return view('income_sources.index', compact('income_sources'));
    }

    /**
     * Show the form for creating new IncomeSource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income_sources.create');
    }

    /**
     * Store a newly created IncomeSource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeSourcesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeSourcesRequest $request)
    {
        IncomeSource::create($request->all());

        return redirect()->route('income_sources.index');
    }

    /**
     * Show the form for editing IncomeSource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income_source = IncomeSource::findOrFail($id);

        return view('income_sources.edit', compact('income_source'));
    }

    /**
     * Update IncomeSource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomeSourcesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeSourcesRequest $request, $id)
    {
        $income_source = IncomeSource::findOrFail($id);
        $income_source->update($request->all());

        return redirect()->route('income_sources.index');
    }

    /**
     * Remove IncomeSource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income_source = IncomeSource::findOrFail($id);
        $income_source->delete();

        return redirect()->route('income_sources.index');
    }

    /**
     * Delete all selected IncomeSource at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = IncomeSource::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
