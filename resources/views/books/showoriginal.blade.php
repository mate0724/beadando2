<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
</head>
<body>
    <h1>Book Details</h1>

    <p><strong>ID:</strong> {{ $book->id }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
    <p><strong>Year:</strong> {{ $book->year }}</p>
    <p><strong>Edition:</strong> {{ $book->edition }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    <p><strong>Available:</strong> {{ $book->available ? 'Yes' : 'No' }}</p>

    <a href="{{ route('books.index') }}">Back to List</a>
    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
</body>
</html>
