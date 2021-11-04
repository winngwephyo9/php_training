@extends('books.layout')

@section('content')

<h1> Import And Export For Book Store</h1>
<div class="fa-upload">
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
                    <button class="btn btn-danger">Import</button>
                    <a class="btn btn-success ml-3" href="{{ url('/export-books') }}"> Export</a>
                </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('products.index') }}"> Products</a>
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New book</a>
            </div>
        </div>
    </div>
</div>
<div class="row col-lg-6 pull-left">
    <form action="{{  url('/search/books')  }}" method="get">
        <div class="col-md-12">
            <div class="form-group pull-left">
                <label for="">Start Date</label>
                <input type="date" class="form-control" name="start_date">
            </div>

            <div class="form-group pull-right ml-3">
                <label for="">End Date</label>
                <input type="date" class="form-control" name="end_date">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
        </div>
    </form>
</div>
<div class="row col-lg-6 pull-right">

    <form action="{{  url('/search.name/books')  }}" method="get">

        <div class="col-md-12">
            <div class="form-group pull-left">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
        </div>
    </form>

    <form action="{{  url('/search.detail/books')  }}" method="get">

        <div class="col-md-12">
            <div class="form-group pull-left">
                <label for="">Details</label>
                <input type="text" class="form-control" name="detail">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
        </div>
    </form>
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
        <th width="320px">Action</th>
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
                <a class="btn btn-success" href="{{ route('books.mail',$book->id) }}">Email</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection