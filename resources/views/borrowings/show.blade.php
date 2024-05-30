<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Borrowing Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
            <p><strong>Book Title:</strong> {{ $borrowing->book->title }}</p>
            <p><strong>Member Name:</strong> {{ $borrowing->member->name }}</p>
            <p><strong>Borrowed At:</strong> {{ $borrowing->borrowed_at }}</p>
            <p><strong>Due Date:</strong> {{ $borrowing->due_date }}</p>
            <p><strong>Returned At:</strong> {{ $borrowing->returned_at ?? 'Not Returned' }}</p>
            @if(!$borrowing->returned_at)
            <a href="{{ route('borrowings.returnbook', $borrowing->id) }}" class="mybutton">Return</a>
            @endif
            <br>
            <a href="{{ route('borrowings.index') }}" class="mybutton">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>