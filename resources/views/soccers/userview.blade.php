@extends ("layouts.app")

@section ("content")

<style>
    div.scrollmenu {
        background-color: #ffffff;
        overflow: auto;
        white-space: nowrap;
    }

    div.scrollmenu1 {
        width: 100%;
        position: relative;
        background-color: #ffffff;
        overflow: auto;
        white-space: nowrap;
    }

    div.scrollmenu button {
        display: inline-block;
        /* color: white; */
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }

    div.scrollmenu button .active {
        text-decoration-thickness: bold;
    }

    div.scrollmenu1 a {
        display: inline-block;
        /* color: white; */
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }

    div.scrollmenu1 a:hover {
        background-color: #777;
    }

    .mask-youtube {
        position: absolute;
        background: rgba(0, 0, 0, 0);
        width: 160px;
        height: 200px;
        top: 0;
        left: 0;
    }

    @media (min-width: 335px) {
    .mask-youtube {
        width: 120px !important;
        }
    }

    @media (min-width: 375px) {
    .mask-youtube {
        width: 130px !important;
        }
    }

    @media (min-width: 576px) {
    .mask-youtube {
        width: 140px !important;
        }
    }
    
@media (min-width: 768px) {
    .mask-youtube {
    width: 200px !important;
  }
}

@media (min-width: 992px) {
    .mask-youtube {
    width: 290px !important;
  }
}


@media (min-width: 1200px) {
    .mask-youtube {
    width: 350px !important;
  }
}

@media (min-width: 1400px) {
    .mask-youtube {
    width: 400px !important;
  }
}
</style>

<div class="container text-center py-4">


    <div class="scrollmenu">
        <div class=" nav-tabs" id="nav-tab" role="tablist" style="text-align: left;">

            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Live</button>

            <button class="nav-link" id="nav-table-tab" data-bs-toggle="tab" data-bs-target="#nav-table" type="button" role="tab" aria-controls="nav-table" aria-selected="false">Standings</button>

            <button class="nav-link" id="nav-highlight-tab" data-bs-toggle="tab" data-bs-target="#nav-highlight" type="button" role="tab" aria-controls="nav-highlight" aria-selected="false">Highlights</button>

        </div>
    </div>


    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class=" bg-success py-3">
                @if(date("Y-m-d H:i", strtotime($lastMatch['play_time'])+7200) < date("Y-m-d H:i")) 
                <div class=" h4 bg-warning "> !!! No Matches Today !!! </div>

            @else
            @foreach ($matches as $match)
            @if(date("Y-m-d H:i", strtotime($match['play_time'])+7200)>= date("Y-m-d H:i"))


            <div class="card text-center  m-3" style="height:auto;">
                <div class="bg-light ">{{$match->league->name}} </div>

                <table class=" table table-borderless">

                    <tr>
                        <td style="width:25%;  height: auto; vertical-align:top;">
                            <div>
                                {{$match->homeTeam->short_name}}
                            </div>

                            <img class="rounded-circle" src="{{url('/images').'/'.$match->homeTeam->logo}}" alt=" {{$match->homeTeam->name}}" width="60px" height="60px">
                        </td>
                        <td>

                            @if((date("y-m-d H:i ")< date("y-m-d H:i ", strtotime($match['play_time'])+7200)) && date("y-m-d H:i ")>= date("y-m-d H:i ", strtotime($match['play_time'])))
                                </br>
                                <div class=" btn btn-danger disabled text-light">
                                <span class="spinner-grow spinner-grow-sm"></span>Live
            </div>

            @elseif(date("Y-m-d", strtotime($match['play_time'])) > date("Y-m-d"))
            <div class="btn btn-outline-info disabled text-muted">Live On</div>
            </br>
            <small>{{date("d-m-y | h:i  A", strtotime($match['play_time']))}}</small>

            @else
            <div class="btn btn-outline-info disabled text-muted">Live On</div></br>
            Today :
            <small>{{date("h:i A", strtotime($match['play_time']))}}</small>

            @endif



            </td>

            <td style="width:25%; vertical-align:top;">
                <div>
                    {{$match->awayTeam->short_name}}
                </div>

                <img class="rounded-circle" src="{{url('/images').'/'.$match->awayTeam->logo}}" alt="{{$match->awayTeam->name}}" width="60px" height="60px">
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

        </div>

        @endif


        @endforeach


        @endif

    </div>
</div>


<!-- Highlights -->
<div class=" tab-pane fade" id="nav-highlight" role="tabpanel" aria-labelledby="nav-highlight-tab">
    <div class=" bg-success py-3 px-2 px-sm-5">
        @foreach($highlights as $highlight)

        <div class="card mb-3 px-2" style="">
            <div class="row g-0">
                <div class="col-4 pt-2">
                    <iframe class="live-video" src="{{$highlight->videoLink.'?rel=0'}}" style=" width: 100%;" frameborder="0"></iframe>
                    <div class="mask-youtube"></div>
                </div>

                <div class="col-8">
                    <div class="card-body text-start" style="height: 110px; line-height: 1rem;">
                        @auth
                        <span class="float-end">
                            <a href="{{url("/highlight/delete/$highlight->id")}}" class="bordered-circle text-danger">X</a>
                        </span>
                        @endauth
                        <h5 class="card-title">Highlight</h5>
                        <p class="card-text small">{{$highlight->description}}</p>
                       
                        <a href="{{url("/highlight/play/$highlight->id")}}" class=" btn btn-primary float-end " >View</a>
                       
                    </div>


                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<!--table -->
<div class="tab-pane fade" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
    <div class="bg-success py-3 px-3 px-sm-5">


        <div class=" scrollmenu1">

            <a class="nav-link" href="https://www.fctables.com/england/premier-league/iframe/?type=table&lang_id=2&country=67&template=10&team=&timezone=Indian/Cocos&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&font=Verdana&fs=13&lh=22&bg=FFFFFF&fc=333333&logo=1&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF" target="myiframe">Premier</a>

            <a class="nav-link" href="https://www.fctables.com/spain/liga-bbva/iframe/?type=table&lang_id=2&country=67&template=43&team=&timezone=Indian/Cocos&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&font=Verdana&fs=13&lh=22&bg=FFFFFF&fc=333333&logo=1&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF" target="myiframe">Laliga</a>

            <a class="nav-link" href="https://www.fctables.com/germany/1-bundesliga/iframe/?type=table&lang_id=2&country=67&template=16&team=&timezone=Indian/Cocos&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&font=Verdana&fs=13&lh=22&bg=FFFFFF&fc=333333&logo=1&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF" target="myiframe">Bundesliga</a>

            <a class="nav-link" href="https://www.fctables.com/italy/serie-a/iframe/?type=table&lang_id=2&country=67&template=17&team=&timezone=Indian/Cocos&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&font=Verdana&fs=13&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=0&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF" target="myiframe">SeriesA</a>

            <a class="nav-link" href="https://www.fctables.com/france/ligue-1/iframe/?type=table&lang_id=2&country=67&template=15&team=&timezone=Indian/Cocos&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&font=Verdana&fs=13&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=0&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF" target="myiframe">League 1</a>

        </div>

        <iframe frameborder="0" name="myiframe" scrolling="no" width="100%" height="600px" src="https://www.fctables.com/england/premier-league/iframe/?type=table&lang_id=2&country=67&template=10&team=&timezone=Indian/Cocos&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&font=Verdana&fs=13&lh=22&bg=FFFFFF&fc=333333&logo=1&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF"></iframe>
        <div style="text-align:center;"></div>


    </div>
</div>
</div>
</div>

<script type='text/javascript' src='//primevalstork.com/bf/1b/ba/bf1bba08b4573363cd71cd057ad130a3.js'></script>

@endsection