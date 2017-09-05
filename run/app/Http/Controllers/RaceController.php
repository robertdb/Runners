<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoMarathon;

class RaceController extends Controller
{

    private function getAllRaces()
    {
      return InfoMarathon::all();
    }


    public function index()
    {
      $marathons = $this->getAllRaces();
      return view('race.races')->with('races', $marathons);
    }

    public function indexJson()
    {
      return $this->getAllRaces();
    }

    public function showRace($id)
    {
      $marathon = InfoMarathon::find($id);
      return view('race.race')->with('race', $marathon);
    }
}
