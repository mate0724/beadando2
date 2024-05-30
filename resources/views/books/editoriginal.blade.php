<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Author:</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" required>
        </div>
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" required>
        </div>
        <div>
            <label>Publisher:</label>
            <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
        </div>
        <div>
            <label>Year:</label>
            <input type="number" name="year" value="{{ old('year', $book->year) }}" required>
        </div>
        <div>
            <label>Edition:</label>
            <input type="number" name="edition" value="{{ old('edition', $book->edition) }}" required>
        </div>
        <div>
            <label>ISBN:</label>
            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
        </div>
        <div>
            <label>Available:</label>
            <input type="checkbox" name="available" value="1" {{ old('available', $book->available) ? 'checked' : '' }}>
        </div>
        <div>
            <button type="submit">Update Book</button>
        </div>
    </form>
</body>
</html>
