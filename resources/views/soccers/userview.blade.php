@extends ("layouts.app")

@section ("content")

<div class="container text-center py-4">

    <div class=" bg-success py-3">


    
    
            @foreach ($matches as $match)
            @if(date("d-m-y H:i", strtotime($match['play_time'])+7200) >= (date("d-m-y H:i")) )
            <div class="card text-center  m-3">
                <div class="bg-light h5">{{$match->league->name}}</div>
                <table class=" table table-borderless">

                    <tr>
                        <td style="width:25%; vertical-align:top;">
                            <h6>{{$match->homeTeam->short_name}}
                            </h6>
                            <img class="" src="{{url('/images').'/'.$match->homeTeam->logo}}" alt=" {{$match->homeTeam->name}}" width="65px" height="60px">
                        </td>
                        <td>
                         
                            @if((date("d-m-y H:i ")< date("d-m-y H:i ", strtotime($match['play_time'])+7200)) && date("d-m-y H:i ")>= date("d-m-y H:i ", strtotime($match['play_time'])))
                            </br>
                            <div class="btn btn-danger disabled text-light">
                            <span class="spinner-grow spinner-grow-sm"></span>Live</div>

                            @elseif(date("d-m-y", strtotime($match['play_time'])) > date("d-m-y"))
                            <div class="btn btn-outline-info disabled text-muted">Live On</div>
                            </br>
                            <small>{{date("d-m-y | h:i  A", strtotime($match['play_time']))}}</small>

                            @else
                            <div class="btn btn-outline-info disabled text-muted">Live On</div></br>
                            Today :
                            <small>{{date("h:i  A", strtotime($match['play_time']))}}</small>

                            @endif

            </div>

            </td>

            <td style="width:25%; vertical-align:top;">
                <h6>{{$match->awayTeam->short_name}}</h6>

                <img class="" src="{{url('/images').'/'.$match->awayTeam->logo}}" alt="{{$match->awayTeam->name}}" width="65px" height="60px">
            </td>
            </tr>


            </table>
            <div class="bg-light">

                @foreach($match->link as $d)
                @if($d->adFlg)
                <a href="http://ouo.io/qs/jvevf9dU?s={{url("/view/$match->id/$d->id")}}" class=" bg-primary text-light rounded">{{$d->name}}</a>
                @else
                <a href="{{url("/view/$match->id/$d->id")}}" class="bg-primary text-light rounded">{{$d->name}}</a>
                @endif
                @endforeach

            </div>
            <div>


            </div>
        </div>
      
        @endif
        
        @endforeach
       
    </div>
   
</div>



@endsection