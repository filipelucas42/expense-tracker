@extends('layouts.app')
@section('content')
<div class="container mb-3">
    <form action="{{route('category.store')}}" method="post">
        <div class="mb-3">
            @csrf
            <label for="category" class="form-label">Category:</label>
            <input type="text" class="form-control" id="category" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Category</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></td>
            <td>
                <form action="{{route('category.edit', $category->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning">Modify</button>
                </form>
            </td>
            <td>
                <form action="{{route('category.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection