<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionsRequest;
use App\Http\Requests\UpdateTransactionsRequest;

class TransactionsController extends Controller
{

    /**
     * Display a listing of Transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::all();

        if (!$request->has('project')) {
            $transactions = Transaction::all();
        } else {
            $transactions = Transaction::where('project_id', $request->project)->get();
        }

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating new Transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('title', 'id')->prepend('Please select', ''),
            'transaction_types' => \App\TransactionType::get()->pluck('title', 'id')->prepend('Please select', ''),
            'income_sources' => \App\IncomeSource::get()->pluck('title', 'id')->prepend('Please select', ''),
            'currencies' => \App\Currency::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('transactions.create', $relations);
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionsRequest $request)
    {
        Transaction::create($request->all());

        return redirect()->route('transactions.index');
    }

    /**
     * Show the form for editing Transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('title', 'id')->prepend('Please select', ''),
            'transaction_types' => \App\TransactionType::get()->pluck('title', 'id')->prepend('Please select', ''),
            'income_sources' => \App\IncomeSource::get()->pluck('title', 'id')->prepend('Please select', ''),
            'currencies' => \App\Currency::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $transaction = Transaction::findOrFail($id);

        return view('transactions.edit', compact('transaction') + $relations);
    }

    /**
     * Update Transaction in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionsRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('transactions.index');
    }

    /**
     * Remove Transaction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index');
    }

    /**
     * Display Transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('title', 'id')->prepend('Please select', ''),
            'transaction_types' => \App\TransactionType::get()->pluck('title', 'id')->prepend('Please select', ''),
            'income_sources' => \App\IncomeSource::get()->pluck('title', 'id')->prepend('Please select', ''),
            'currencies' => \App\Currency::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact('transaction') + $relations);
    }

    /**
     * Delete all selected Transaction at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Transaction::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
