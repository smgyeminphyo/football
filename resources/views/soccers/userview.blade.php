@extends ("layouts.app")

@section ("content")

<div class="container text-center py-4">

    <div class=" bg-success py-3">

            @foreach ($matches as $match)


           
            <div class="card text-center  m-3">
                <div class="bg-light h5">{{$match->league->name}}</div>
                <table class=" table table-borderless">

                    <tr>
                        <td style="width:25%; vertical-align:top;">
                            <h6>{{$match->homeTeam->short_name}}
                            </h6>
                            <img class="" src="{{url('/images').'/'.$match->league->short_name.'/'.$match->homeTeam->logo}}" alt=" {{$match->homeTeam->name}}" width="50" height="60px">
                        </td>
                        <td>
                            
                            @if(date("y-m-d", strtotime($match['play_time'])) == date("y-m-d") )
                            <div class=" text-primary">
                                Live Now
                            </div></br>
                            <small>{{date("h:i-a", strtotime($match['play_time']))}}</small>

                            @elseif(date("y-m-d", strtotime($match['play_time'])) > date("y-m-d"))
                            <div class="text-muted">Live on</div>
                            <small>{{date("y-m-d h:m  a", strtotime($match['play_time']))}}</small>

                            @endif

            </div>

            </td>

            <td style="width:25%; vertical-align:top;">
                <h6>{{$match->awayTeam->short_name}}</h6>

                <img class="" src="{{url('/images').'/'.$match->league->short_name.'/'.$match->awayTeam->logo}}" alt="{{$match->awayTeam->name}}" width="50" height="60px">
            </td>
            </tr>


            </table>
            <div class="bg-light">

                @foreach($match->link as $d)
                @if($d->adFlg)
                <a href="http://ouo.io/qs/jvevf9dU?s={{url("/view/$match->id/$d->id")}}" class=" bg-primary text-light rounded">Link</a>
                @else
                <a href="{{url("/view/$match->id/$d->id")}}" class="bg-primary text-light rounded">link</a>
                @endif
                @endforeach

            </div>
            <div>


            </div>
        </div>
      

        @endforeach
        
    </div>
   
</div>



@endsection