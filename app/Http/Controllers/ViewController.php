<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayMatch;
use App\Models\League;
use App\Models\Team;

class ViewController extends Controller
{
    Public function index() {
        
        $data = PlayMatch::select('*')->orderBy('play_time')->get();

        return view('soccers.userview', [
            'matches' => $data,
            
            
        ]);
       
        
    }
}
