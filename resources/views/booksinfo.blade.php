@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

            <div>
                <a class="btn btn-sm btn-primary" href="/add-book-form">
                    Add New Book
                </a>
            </div>

            <table class="table" id="organizations-table">
                <thead>
                    <tr>
                    <td> ID </td>
                    <td> Book Title </td>
                    <td> Author </td>
                    <td> Description </td>
                    <td> Year Published </td>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booksinfo as $book)
                    <tr>
                    <td>{{ $book->getId() }}</td>
                    <td>{{ $book->getBookTitle() }}</td>
                    <td>{{ $book->getAuthor() }}</td>
                    <td>{{ $book->getDescription() }}</td>
                    <td>{{ $book->getYear() }}</td>
                        <td>
                            <a href="/edit-book/{{ $book->getId() }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <a onclick="return confirmDelete()" href="/delete-book/{{ $book->getId() }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>

function confirmDelete() {
    var answer = confirm('Are you sure you want to delete this record? this is not reversible');
    if (answer == true) {
        return true;
    }
    return false;
}



</script>

@endsection