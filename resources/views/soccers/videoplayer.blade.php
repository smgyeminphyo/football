@extends ("layouts.app")

@section ("content")

<div class="container py-4">
 
 <iframe class="live-video" src="{{$PlayLink}}" style=" width: 100%;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="true"></iframe> 
</div>
<style>
.live-video {
    height: 300px !important;
  }

@media (min-width: 576px) {
    .live-video {
    height: 400px !important;
  }
}

@media (min-width: 768px) {
    .live-video {
    height: 500px !important;
  }
}

@media (min-width: 992px) {
    .live-video {
    height: 610px !important;
  }
}


@media (min-width: 1200px) {
    .live-video {
    height: 610px !important;
  }
}

@media (min-width: 1400px) {
  .live-video {
    height: 610px !important;
  }
  }
</style>
@endsection