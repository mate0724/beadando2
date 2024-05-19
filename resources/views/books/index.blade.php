<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <a href="{{ route('books.create') }}">Add New Book</a>

    
    <form method="GET" action="{{ route('books.index') }}">
        <label for="filter">Search By:</label>
        <select name="filter" id="filter">
            <option value="author">Author</option>
            <option value="title">Title</option>
            <option value="id">ID</option>
            <option value="isbn">ISBN</option>
        </select>
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Publisher</th>
                <th>Year</th>
                <th>Edition</th>
                <th>ISBN</th>
                <th>Available</th>
                <th>Copies</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->author }}</td>
                    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->edition }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->available ? 'Yes' : 'No' }}</td>
                    <td>{{ $book->copies }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <form method="POST" action="{{ route('books.destroyCopy', $book->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Copy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
