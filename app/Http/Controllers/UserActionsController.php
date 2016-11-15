<?php

namespace App\Http\Controllers;

use App\UserAction;

class UserActionsController extends Controller
{

    /**
     * Display a listing of UserAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_actions = UserAction::all();

        return view('user_actions.index', compact('user_actions'));
    }
}
