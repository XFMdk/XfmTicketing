<?php

namespace App\Http\Controllers;

use App\Episode;
use App\RadioShow;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Request $request, $showId)
    {
        $show = RadioShow::find($showId);
        $episodes = Episode::where('radio_show_id', '=', $showId)->get();

        return view('episode.index', ['episodes' => $episodes, 'show' => $show ]);
    }

    public function create(Request $request, $showId)
    {
        $request->validate([
            'description' => 'required|max:512',
        ]);

        $show = RadioShow::find($showId);

        $episodeNumber = 1;

        if ($show->episodes->count() > 0)
        {
            $episodeNumber = $show->episodes->last()->episode_number + 1;
        }

        if ($show->active === false)
        {
            throw new Exception("You can only create episodes for active shows");
        }

        $name = $show->name;

        if ($show->season != null)
        {
            $name = $name.' '.$show->season.'x'. sprintf("%02d", $episodeNumber);;
        }

        Episode::create([
            'name' => $name,
            'episode_number' => $episodeNumber,
            'radio_show_id' => $showId,
            'description' => $request->description,
        ]);

        return redirect('shows/'.$showId.'/episodes');
    }
}
