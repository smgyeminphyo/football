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
<div class="card py-5 px-4 py-3 px-2 px-sm-5 ">
    <div class="card-header h3">Highlight create page</div>
    <form method="post">
        @csrf
       
<table class="table table-borderless" >
    <tr>
        <td colspan="3">
        <label>Description</label>
            <input type="text" name="description" placeholder="text" class="form-control">
        </td>
    </tr>
    <tr>
        <td colspan="3">
        <label>Video Link</label>
            <input type="text" name="videoLink" placeholder="link" class="form-control">
        </td>
    </tr>
</table>

<div class="text-center">
</br>
<input type="submit" value="Add" class="btn btn-primary w-25">
</div>
        
    </form>
</div>
</div>
@endsection