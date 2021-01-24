@extends('layouts.app')
@section('content')
<div class="container mb-3">
    <form action="{{route('expense.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="value" class="form-label">Value:</label>
            <input type="number" class="form-control" id="value" name="value" step="0.01">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>        
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select name="category_id" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Expense</button>
    </form>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Value</th>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
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
            <td>{{$expense->category->name}}</td>

        </tr>
    @endforeach
    </tbody>
</table>
</div>

<script>
    document.getElementById('date').valueAsDate = new Date();
</script>
@endsection