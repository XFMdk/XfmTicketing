<?php

namespace App\Http\Controllers;

use App\User;
use App\RadioShow;
use Illuminate\Http\Request;

class RadioShowController extends Controller
{
    public function index()
    {
        $shows = RadioShow::all();
        $users = User::all();
        return view('show.index', [ 'shows' => $shows, 'users' => $users ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:radio_shows|max:255',
            'user_id' => 'required|exists:users,id',
            'active' => 'required',
            'description' => 'required|max:512',
        ]);

        RadioShow::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'season' => $request->season,
            'active' => $request->active ? 1 : 0,
            'description' => $request->description,
        ]);

        return redirect('shows');
    }
}
