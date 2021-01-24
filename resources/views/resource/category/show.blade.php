@extends('layouts.app')
@section('content')
<div class="container mb-3">
<h1>Category: {{$category->name}}</h1>
</div>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Value</th>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
    @foreach($expenses as $expense)
        <tr>
            <td>{{$expense->value}}</td>
            <td>
                {{$expense->date}}
            </td>
            <td>
                {{$expense->description}}
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection