<?php

namespace App\Http\Controllers;

use App\TransactionType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionTypesRequest;
use App\Http\Requests\UpdateTransactionTypesRequest;

class TransactionTypesController extends Controller
{

    /**
     * Display a listing of TransactionType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction_types = TransactionType::all();

        return view('transaction_types.index', compact('transaction_types'));
    }

    /**
     * Show the form for creating new TransactionType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction_types.create');
    }

    /**
     * Store a newly created TransactionType in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionTypesRequest $request)
    {
        TransactionType::create($request->all());

        return redirect()->route('transaction_types.index');
    }

    /**
     * Show the form for editing TransactionType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction_type = TransactionType::findOrFail($id);

        return view('transaction_types.edit', compact('transaction_type'));
    }

    /**
     * Update TransactionType in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionTypesRequest $request, $id)
    {
        $transaction_type = TransactionType::findOrFail($id);
        $transaction_type->update($request->all());

        return redirect()->route('transaction_types.index');
    }

    /**
     * Remove TransactionType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction_type = TransactionType::findOrFail($id);
        $transaction_type->delete();

        return redirect()->route('transaction_types.index');
    }

    /**
     * Delete all selected TransactionType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = TransactionType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
