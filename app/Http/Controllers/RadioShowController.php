<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RadioShow;

class RadioShowController extends Controller
{
    public function index()
    {
        $shows = RadioShow::all();
        return view('show.index', [ 'shows' => $shows ]);
    }
}
