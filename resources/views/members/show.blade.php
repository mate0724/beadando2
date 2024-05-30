 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$member->name}}'s Borrowing
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @section('content')

                @if(!empty($borrowings && !is_null($borrowings)))

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
                                <tr>
                                    <td class="py-2">{{ $borrowing->book->title }}</td>
                                    <td class="py-2">{{ $borrowing->member->name }}</td>
                                    <td class="py-2">{{ $borrowing->borrowed_at }}</td>
                                    <td class="py-2">{{ $borrowing->due_date }}</td>
                                    <td class="py-2">{{ $borrowing->returned_at ?? 'Not Returned' }}</td>
                                </tr>
                            @endforeach
                @else
                <div>Dont have Borrowings</div>
                @endif  
                    </tbody>
                </table>
                <a href="{{ route('members.index') }}" class="mybutton" class="mybutton">Back to Members</a>
            </div>
        </div>
    </div>
</x-app-layout>

