<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoMarathon;

class RaceController extends Controller
{
    public function index()
    {
      $marathons = InfoMarathon::all();
      return view('race.races')->with('races', $marathons);
    }

    public function showRace($id)
    {
      $marathon = InfoMarathon::find($id);
      return view('race.race')->with('race', $marathon);
    }
}
