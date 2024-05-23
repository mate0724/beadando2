<!DOCTYPE html>
<html>

<head>
    <title>Members</title>
</head>

<body>
    <h1>Members</h1>

    @if (session('success'))
    <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('members.create') }}">Add New Member</a>

    <!-- Keresési űrlap -->
    <form action="{{ route('members.index') }}" method="GET" class="mb-4">
        <div class="flex space-x-2">
            <input type="text" name="search" placeholder="Search..." class="form-input w-full">
            <select name="field" class="form-select">
                <option value="name">Name</option>
                <option value="address">Address</option>
            </select>
            <button type="submit" class="bg-gray-500 text-white rounded px-4 py-2">Search</button>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Type</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->type }}</td>
                <td>{{ $member->contact }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}">Edit</a>
                    <form method="POST" action="{{ route('members.destroy', $member->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</body>

</html>