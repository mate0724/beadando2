<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div>
            <label>Author:</label>
            <input type="text" name="author" value="{{ old('author') }}" required>
        </div>
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label>Publisher:</label>
            <input type="text" name="publisher" value="{{ old('publisher') }}" required>
        </div>
        <div>
            <label>Year:</label>
            <input type="number" name="year" value="{{ old('year') }}" required>
        </div>
        <div>
            <label>Edition:</label>
            <input type="number" name="edition" value="{{ old('edition') }}" required>
        </div>
        <div>
            <label>ISBN:</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}" required>
        </div>
        <div>
            <label>Available:</label>
            <input type="checkbox" name="available" value="1" {{ old('available') ? 'checked' : '' }}>
        </div>
        <div>
            <button type="submit">Add Book</button>
        </div>
    </form>
</body>
</html>
