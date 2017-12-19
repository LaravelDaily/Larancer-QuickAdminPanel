<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Index page
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = Transaction::with('project')
            ->with('transaction_type')
            ->with('income_source')
            ->with('currency')
            ->orderBy('transaction_date', 'desc');

        if ($request->has('project') && !empty($request->project)) {
            $q->where('project_id', $request->project);
        }

        $transactions = $q->get();

        $entries = [];
        foreach ($transactions as $row) {
            if ($row->transaction_date != null) {
                $date = Carbon::createFromFormat('Y-m-d', $row->transaction_date)->format("Y-m");
                if (!isset($entries[$date])) {
                    $entries[$date] = [];
                }
                $currency = $row->currency->code;
                if (!isset($entries[$date][$currency])) {
                    $entries[$date][$currency] = [
                        'income'   => 0,
                        'expenses' => 0,
                        'fees'     => 0,
                        'total'    => 0
                    ];
                }
                $income   = 0;
                $expenses = 0;
                $fees     = 0;
                if ($row->amount > 0) {
                    $income += $row->amount;
                } else {
                    $expenses += $row->amount;
                }
                if (!is_null($row->income_source->fee_percent)) {
                    $fees = $row->amount * ($row->income_source->fee_percent / 100);
                }

                $total = $income + $expenses - $fees;
                $entries[$date][$currency]['income'] += $income;
                $entries[$date][$currency]['expenses'] += $expenses;
                $entries[$date][$currency]['fees'] += $fees;
                $entries[$date][$currency]['total'] += $total;
            }
        }
        $projects = Project::pluck('title', 'id')->prepend('--- All projects ---', '');
        if ($request->has('project')) {
            $currentProject = $request->get('project');
        } else {
            $currentProject = '';
        }

        return view('reports.index', compact('entries', 'projects', 'currentProject'));
    }
}
