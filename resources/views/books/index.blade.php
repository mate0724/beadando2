<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4 rounded">
                    {{ session('error') }}
                </div>
                @endif

                <form method="GET" action="{{ route('books.index') }}">
                <label for="filter">Search By:</label>
                <select name="filter" id="filter">
                <option value="author">Author</option>
                <option value="title">Title</option>
                <option value="id">ID</option>
                <option value="ISBN">ISBN</option>
                </select>
                <input type="text" name="search" placeholder="Search...">
                <button type="submit"  class="mybutton">Search</button>
                </form>

                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Author</th>
                            <th class="py-2">Title</th>
                            <th class="py-2">Publisher</th>
                            <th class="py-2">Year</th>
                            <th class="py-2">Edition</th>
                            <th class="py-2">ISBN</th>
                            <th class="py-2">Available</th>
                            <th class="py-2">Copies</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                <tr onclick="document.location='{{route('books.show', $book->id)}}'" style="cursor:pointer">
                    <td class="py-2">{{ $book->id }}</td>
                    <td class="py-2">{{ $book->author }}</td>
                    <td class="py-2">{{ $book->title }}</td>
                    <td class="py-2">{{ $book->publisher }}</td>
                    <td class="py-2">{{ $book->year }}</td>
                    <td class="py-2">{{ $book->edition }}</td>
                    <td class="py-2">{{ $book->ISBN }}</td>
                    <td class="py-2">{{ $book->available ? 'Yes' : 'No' }}</td>
                    <td class="py-2">{{ $book->copies }}</td>
                    <td class="py-2">
                        <a href="{{ route('books.edit', $book->id) }}" class="mybutton">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mybutton">Delete</button>
                        </form>
                        <form method="POST" action="{{ route('books.destroyCopy', $book->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mybutton">Delete Copy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
                <a href="{{ route('books.create') }}" class="mybutton">Add New Book</a>
            </div>
        </div>
    </div>
</x-app-layout>
