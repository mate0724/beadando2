<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        @if (session('success'))
                        <li>{{ session('success') }}</li>
@endif
                    </ul>
                </div>
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
            <label>copies:</label>
            <input type="number" name="copies" value="{{ old('copies') }}" required>
        </div>
        <div>
            <label>Available:</label>
            <input type="checkbox" name="available" value="1" {{ old('available') ? 'checked' : '' }}>
        </div>
        <div>
            <button type="submit" class="mybutton">Add Book</button>
        </div>
                </form>
                <a href="{{ route('books.index') }}" class="mybutton">Back to Book List</a>
            </div>
        </div>
    </div>
</x-app-layout>