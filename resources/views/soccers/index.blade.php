


@extends ("layouts.app")

@section ("content")

<div class="container text-center py-4">
<h3> Match Table </h3>
    <div class="  py-3">
 
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                
                <td>League</td>
                <td>Home Team</td>
                <td>Away Team</td>
                <td>Play Time</td>
                <td>Insert Links</td>
                <td colspan="2">Edit & Delete</td>
                
            </tr>
        </thead>
        @foreach ($matches as $match)
       
        <tbody>
      
            <tr>  
                <td>{{$match->league->name}}</td>
                <td>{{$match->homeTeam->name}}</td>
                <td>{{$match->awayTeam->name}}</td>
                <td>{{date("d-m-y / h:i  A", strtotime($match['play_time']))}}</td>
                <td>
                    <a href="{{url("/match/insertLink/$match->id") }}"" class="btn btn-warning">INSERT</a>
                </td>
                <td> 
                    <a class="btn btn-warning" href="{{url("/match/edit/$match->id")}} ">edit</a>
                </td>
                <td>
                    <a href="{{ url("/match/delete/$match->id") }}" class="btn btn-danger" >delete</a>
                </td>
                
            </tr>
            
        </tbody>
       
            @endforeach
        </table>
     
    </div>
</div>



@endsection