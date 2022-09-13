<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayMatch extends Model
{
    use HasFactory;
    Public function awayTeam() {
        return $this->belongsTo('App\Models\Team', 'away_teamID');
    }

    Public function homeTeam() {
        return $this->belongsTo('App\Models\Team', 'home_teamID');
    }

    Public function league() {
        return $this->belongsTo('App\Models\League');
    }

    Public function link() {
        return $this->hasMany('App\Models\MatchLink');
    }
}
