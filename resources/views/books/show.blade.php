<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
            <p><strong>ID:</strong> {{ $book->id }}</p>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Title:</strong> {{ $book->title }}</p>
            <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
            <p><strong>Year:</strong> {{ $book->year }}</p>
            <p><strong>Edition:</strong> {{ $book->edition }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Available:</strong> {{ $book->available ? 'Yes' : 'No' }}</p>

            <a href="{{ route('books.edit', $book->id) }}" class="mybutton">Edit</a>
            <br>
            <a href="{{ route('books.index') }}" class="mybutton">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>