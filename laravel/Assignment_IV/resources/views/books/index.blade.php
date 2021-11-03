@extends('books.layout')

@section('content')
<h1> Import And Export For Book Store</h1>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left col-lg-6 pl-0">
            <form action="{{ url('book-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4 col-lg-6 pull-left pl-0">
                    <div class="custom-file text-left">
                        <input type="file" name="file" id="customFile" placeholder="Choose File">
                    </div>
                </div>
                <button class="btn btn-primary">Import</button>
                <a class="btn btn-success ml-3" href="{{ url('/export-books') }}"> Export</a>
            </form>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('products.index') }}"> Products</a>
            <a class="btn btn-success" href="{{ route('books.create') }}"> Create New book</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success mt-3">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered mt-5">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Details</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->detail }}</td>
        <td>{{ $book->created_at }}</td>
        <td>{{ $book->updated_at }}</td>
        <td>
            <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $books->links() !!}

@endsection