<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayMatch;
use App\Models\League;
use App\Models\Team;
use App\Models\Highlight;


class ViewController extends Controller
{
    Public function index() {
        
        date_default_timezone_set('Asia/Rangoon');

        $data = PlayMatch::select('*')->orderBy('play_time')->get();
        $data1 = PlayMatch::select('*')->orderBy('play_time','desc')->first();
        $data2 = Highlight::select('*')->orderBy('created_at', 'desc')->get();

        return view('soccers.userview', [
            'matches' => $data,
            'lastMatch' => $data1,
            'highlights' => $data2,
            
            
        ]);
       
        
    }
}
