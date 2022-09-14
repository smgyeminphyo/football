<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\League;
use App\Models\PlayMatch;
use App\Models\MatchLink;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    Public function index() {

        $data =  PlayMatch::select('*')->orderBy('play_time')->get();
        // dd($data);
        return view('soccers.index', [
            'matches' => $data
            
        ]);
        
    }

     //match create
    Public function add() {

        $data = League::All();
        $data1 = Team::All();
        $match['league'] = $data;
        $match['team'] = $data1;
        
        return view('soccers.add', [
            'matches'=> $match
        ]);

    }

    Public function create() {

        $validator = validator(request()->all(), [
            'league_id' => 'required',
            'home_teamID' => 'required',
            'away_teamID' => 'required',
            'play_time' => 'required',
            
           
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }


        $PlayMatch = new PlayMatch;
        $PlayMatch->league_id = request()->league_id;
        $PlayMatch->home_teamID = request()->home_teamID;
        $PlayMatch->away_teamID = request()->away_teamID;
        $PlayMatch->play_time = request()->play_time;
        
       
        $PlayMatch->save();
        return redirect ('/admin');

    }

    Public function delete($id) {
        $linkData = MatchLink::where('play_match_id',$id);
        $linkData->delete();
        $data = PlayMatch::find($id);
        $data->delete();
        return back();

    }

    //match update
    public function edit($id) {
        $edit = PlayMatch::find($id);
        $data = League::All();
        $data1= Team::All();
        $link = MatchLink::where('play_match_id',$id)->get();
        // dd($link);
        $match['league'] = $data;
        $match['team'] = $data1;
        return view('soccers.edit', [
            'matches' => $match,
            'matchData' => $edit,
            'links' => $link
        ]);
        
    }

    public function update($id) {
        $update = PlayMatch::find($id);
        $update->league_id =  request()->league_id;
        $update->home_teamID = request()-> home_teamID;
        $update->away_teamID = request()-> away_teamID;
        $update->play_time = request()-> play_time;
        $update->save();
        return redirect('/admin');
    }

    //link delete
    public function linkDelete($id) {
        $link = MatchLink::find($id);
        $link->delete();

        return back();
    }
}
