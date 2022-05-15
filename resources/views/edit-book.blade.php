@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Edit Book Record</h1>
            @if ($errors->any())
            <div class ="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
            </div>
            @endif
            <form action="/save-edit-book" method="POST">
                <input type="hidden" name="id" value="{{ $book->getId() }}"/>
                @csrf
                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" class="form-control" name="book_title" value="{{ $book->getBookTitle() }}"/>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" name="author" value="{{ $book->getAuthor() }}"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ $book->getDescription() }}</textarea>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input type="text" class="form-control" name="year" value="{{ $book->getYear() }}"/>
                </div>
                <button type="submit" class="btn btn-primary"> Save Changes </button>
                </form>
        </div>
    </div>
</div>
@endsection