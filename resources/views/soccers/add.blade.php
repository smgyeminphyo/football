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
                    <select class="form-select" name="league_id" id="mySelect" onchange="myFunction()">
                        @foreach($matches['league'] as $league)
                        <option value="{{ $league['id'] }}">
                            {{ $league['name'] }}{{$league['id']}} 
                        </option>
                    
                        @endforeach
                    </select>
                    <script>
                        function myFunction() {
                        var x = document.getElementById("mySelect").value;
                        document.getElementById("demo").innerHTML =   x;

                        }
                    </script>
                        
                        <p id="demo">
              
                            
                        </p>


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
                    <select class="form-select" name="home_teamID">
                        @foreach($matches['team'] as $team)
                        <option class="col-sm-9" value="{{ $team['id'] }}">
                            {{ $team['name'] }}
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-6 form-group row mb-3">
                <label class="col-sm-3 col-form-label">Away Team :</label>
                <div class="col-sm-9">
                    <select class="form-select" name="away_teamID">
                        @foreach($matches['team'] as $team)
                        <option class="col-sm-9" value="{{ $team['id'] }}">
                            {{ $team['name'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>



        <!-- <div class=" form-group row mb-3">
            <label class="col-sm-2 col-form-label float-right">Insert Link :</label>
            <div class="col-sm-8">
                <input type="text" name="link" class="form-control">
            </div>
        </div> -->
        
       


        <input type="submit" value="submit" class="btn btn-primary">
    </form>

</div>
@endsection