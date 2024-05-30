<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
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

                <form method="GET" action="{{ route('members.index') }}">
                <label for="filter">Search By:</label>
                <select name="filter" id="filter">
                <option value="name">Name</option>
                <option value="address">Address</option>
                </select>
                <input type="text" name="search" placeholder="Search...">
                <button type="submit"  class="mybutton">Search</button>
                </form>

                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Addresss</th>
                            <th class="py-2">Type</th>
                            <th class="py-2">Contact</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                    <tr onclick="document.location='{{route('members.show', $member->id)}}'" style="cursor:pointer">
                        <td class="py-2">{{ $member->id }}</td>
                        <!-- <td class="py-2">{{ $member->name }}</td> -->
                        <td class="py-2">{{ $member->name }}</td>
                        <td class="py-2">{{ $member->address }}</td>
                        <td class="py-2">{{ $member->type }}</td>
                        <td class="py-2">{{ $member->contact }}</td>
                        <td class="py-2">
                            <a href="{{ route('members.edit', $member->id) }}" class="mybutton">Edit</a>
                                <form method="POST" action="{{ route('members.destroy', $member->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mybutton">Delete</button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('members.create') }}" class="mybutton">Create Members</a>
            </div>
        </div>
    </div>
</x-app-layout>
