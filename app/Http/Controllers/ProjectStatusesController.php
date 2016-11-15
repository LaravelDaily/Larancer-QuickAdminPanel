<?php

namespace App\Http\Controllers;

use App\ProjectStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectStatusesRequest;
use App\Http\Requests\UpdateProjectStatusesRequest;

class ProjectStatusesController extends Controller
{

    /**
     * Display a listing of ProjectStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_statuses = ProjectStatus::all();

        return view('project_statuses.index', compact('project_statuses'));
    }

    /**
     * Show the form for creating new ProjectStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_statuses.create');
    }

    /**
     * Store a newly created ProjectStatus in storage.
     *
     * @param  \App\Http\Requests\StoreProjectStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectStatusesRequest $request)
    {
        ProjectStatus::create($request->all());

        return redirect()->route('project_statuses.index');
    }

    /**
     * Show the form for editing ProjectStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_status = ProjectStatus::findOrFail($id);

        return view('project_statuses.edit', compact('project_status'));
    }

    /**
     * Update ProjectStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectStatusesRequest $request, $id)
    {
        $project_status = ProjectStatus::findOrFail($id);
        $project_status->update($request->all());

        return redirect()->route('project_statuses.index');
    }

    /**
     * Remove ProjectStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project_status = ProjectStatus::findOrFail($id);
        $project_status->delete();

        return redirect()->route('project_statuses.index');
    }

    /**
     * Delete all selected ProjectStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ProjectStatus::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
