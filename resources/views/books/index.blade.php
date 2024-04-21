@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <h1>All Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>



        @if ($books->isEmpty())
            <p>No books found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
