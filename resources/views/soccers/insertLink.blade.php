@extends ("layouts.app")

@section ("content")
<div class="container">
    <div class="card w-75 pt-4 py-4">
        <div class="card-header h4">Insert Link Page</div>
        <div class="card-body bg-light px-3">
            <form method="post">
                @csrf
                @for($x = 1; $x <= 10; $x++) <div class="row">
                    <label class="h5">Link {{$x}} </label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Link" name="link[]">
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="adFlg{{$x}}" name="adflg[{{$x-1}}]" value="1">
                            <label class="form-check-label" for="adFlg{{$x}}">AD</label>
                        </div>

                    </div>
        </div>

        @endfor
        <input type="submit" value="Save" class="btn btn-primary">

        </form>
    </div>
</div>
</div>
@endsection