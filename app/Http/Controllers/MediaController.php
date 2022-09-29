<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use App\Models\PlayMatch;
use App\Models\MatchLink;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $linkData = MatchLink::find($request->lid);
        $link=$linkData->link;
        return view('soccers.videoplayer', [
            'PlayLink' => $link
        ]);
    }

    public function createLink($id)
    {
        return view('soccers.insertLink');
    }

    public function saveLink($id)
    {


        for ($x = 0; $x < 10; $x++) {
            if (null != request()->link[$x]) {

                $MatchLink = new MatchLink;
                $MatchLink->play_match_id = $id;
                $MatchLink->name = 'Link '.$x+1;
                $MatchLink->link = request()->link[$x];
                if(isset(request()->adflg[$x])) {
                $MatchLink->adFlg = true;
                }else{
                $MatchLink->adFlg = false;
                }

                // 
                $MatchLink->save();
            }
        }

        return redirect('/admin');
    }
    
    public function highlight_play($id) {
        $data = Highlight::find($id);
        $link = $data->videoLink;
        return view('soccers.videoplayer', [
            'PlayLink' => $link
        ]);
    }
}
