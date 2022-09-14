@extends('layouts.app')
@section('content')
<div class="container">

    @if($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif

    <form method="post" class=" card bg-light py-5 px-4   ">
        @csrf
        <div class="row">

            <div class="col-6 form-group row mb-3">
                <label class="col-sm-3 col-form-label">Select League</label>
                <div class="col-sm-9">
                    <select class="form-select" name="league_id" id="leagueID">
                        <option>choose league</option>
                        @foreach($matches['league'] as $league)
                        <option value="{{ $league['id'] }}">
                            {{ $league['name'] }}
                        </option>
                    
                        @endforeach
                    </select>
                
                </div>
            </div>
            <div class="col-6 form-group row mb-3">
                <label class="col-sm-3 col-form-label">Match Time :</label>
                <div class="col-sm-9">
                    <input type="datetime-local" name="play_time" value="{{date("Y-m-d h:i:sa ")}}" class="form-control">
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-6 form-group row mb-3">
                <label class="col-sm-3 col-form-label">Home Team :</label>
                <div class="col-sm-9">
                    <!-- <select class="form-select" name="home_teamID">
                        @foreach($matches['team'] as $team)
                        <option class="col-sm-9" value="{{ $team['id'] }}">
                            {{ $team['name'] }}
                        </option>
                        @endforeach
                    </select> -->
                    <select class="form-select" name="home_teamID" id="team" ></select>
                </div>

            </div>

            <div class="col-6 form-group row mb-3">
                <label class="col-sm-3 col-form-label">Away Team :</label>
                <div class="col-sm-9">
                    <!-- <select class="form-select" name="away_teamID">
                        @foreach($matches['team'] as $team)
                        <option class="col-sm-9" value="{{ $team['id'] }}">
                            {{ $team['name'] }}
                        </option>
                        @endforeach
                    </select> -->
                    <select class="form-select" name="away_teamID" id="team" ></select>
                </div>
            </div>
        </div>
        <input type="submit" value="submit" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            $('#leagueID').on('change', function() {
               var leagueID = $(this).val();
               if(leagueID) {
                   $.ajax({
                       url: '/soccers/add/'+leagueID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(teams)
                       {
                         if(teams){
                            $('#team').empty();
                            $('#team').append('<option hidden>Choose Team</option>'); 
                            $.each(teams, function(key, team){
                                $('select[name="away_teamID"]').append('<option value="'+ team.id +'">' + team.name+ '</option>');
                                $('select[name="home_teamID"]').append('<option value="'+ team.id +'">' + team.name+ '</option>');

                            });
                        }else{
                            $('#team').empty();
                        }
                     }
                   });
               }else{
                 $('#team').empty();
               }
            });
            });
        </script>
                        

</div>
@endsection