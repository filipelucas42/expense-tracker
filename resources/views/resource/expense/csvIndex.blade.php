@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mb-3">Import / Export csv</h1>
<form class="m-1" action="{{route('csv')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Import csv</label>
        <input class="form-control" type="file" id="formFile" name="csv">
    </div>
    <button type="submit" class="btn btn-primary">Submit csv</button>
</form>
</div>
<div class="container">
<a href="{{route('csvExport')}}" target="_blank"><button class="btn btn-primary">Export csv</button></a>
</div>
@endsection
