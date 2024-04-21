@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <h1>Book Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title: {{ $book->title }}</h5>
                <p class="card-text">Author: {{ $book->author }}</p>
                <p class="card-text">Price: {{ $book->price }}</p>
                <p class="card-text">Stock: {{ $book->stock }}</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
