<?php

namespace App\Http\Controllers;

use App\ClientStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientStatusesRequest;
use App\Http\Requests\UpdateClientStatusesRequest;

class ClientStatusesController extends Controller
{

    /**
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_statuses = ClientStatus::all();

        return view('client_statuses.index', compact('client_statuses'));
    }

    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client_statuses.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientStatusesRequest $request)
    {
        ClientStatus::create($request->all());

        return redirect()->route('client_statuses.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client_status = ClientStatus::findOrFail($id);

        return view('client_statuses.edit', compact('client_status'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientStatusesRequest $request, $id)
    {
        $client_status = ClientStatus::findOrFail($id);
        $client_status->update($request->all());

        return redirect()->route('client_statuses.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = ClientStatus::findOrFail($id);
        $client_status->delete();

        return redirect()->route('client_statuses.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ClientStatus::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
