@extends('products.layout')

@section('content')
<h1>CRUD For Book Store</h1>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('books.index') }}"> Books</a>
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

<table class="table table-bordered mt-5">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Details</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

@endsection