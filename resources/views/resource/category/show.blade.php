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
@if($expenses->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if($expenses->previousPageUrl())
        <a class="page-link" href="{{$expenses->previousPageUrl()}}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        @endif
        <li class="page-item"><a class="page-link" >{{$expenses->currentPage()}} of {{$expenses->lastPage()}}</a></li>
        @if($expenses->nextPageUrl())
        <a class="page-link" href="{{$expenses->nextPageUrl()}}" aria-label="Previous">
            <span aria-hidden="true">&raquo;</span>
        </a>
        @endif
    </ul>
</nav>
@endif
</div>
@endsection