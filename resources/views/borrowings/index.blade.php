<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Borrowings') }}
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

                @if (session('late'))
                    <div class="bg-red-500 text-white p-4 mb-4 rounded">
                        {{ session('late') }}
                    </div>
                @endif
                
                @if (session('intime'))
                    <div class="bg-green-500 text-white p-4 mb-4 rounded">
                        {{ session('intime') }}
                    </div>
                @endif

                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Book Title</th>
                            <th class="py-2">Member Name</th>
                            <th class="py-2">Borrowed At</th>
                            <th class="py-2">Due Date</th>
                            <th class="py-2">Returned At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowings as $borrowing)

                            <tr onclick="document.location='{{route('borrowings.show', $borrowing->id)}}'" style="cursor:pointer">
                                <td class="py-2">{{ $borrowing->book->title }}</td>
                                <td class="py-2">{{ $borrowing->member->name }}</td>
                                <!-- <td class="py-2"><a href="{{ route('borrowings.show', $borrowing->member->id) }}">{{ $borrowing->member->name }}</a></td> -->
                                <td class="py-2">{{ $borrowing->borrowed_at }}</td>
                                <td class="py-2">{{ $borrowing->due_date }}</td>
                                <td class="py-2">{{ $borrowing->returned_at ?? 'Not Returned' }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('borrowings.create') }}" class="mybutton">Create Borrowing</a>
            </div>
        </div>
    </div>
</x-app-layout>
