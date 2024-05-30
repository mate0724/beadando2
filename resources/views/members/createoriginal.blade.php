<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>
</head>
<body>
    <h1>Add Member</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('members.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}">
        <br>
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="{{ old('type') }}">
        <br>
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="{{ old('contact') }}">
        <br>
        <button type="submit">Add Member</button>
    </form>

    <a href="{{ route('members.index') }}">Back to Members</a>
</body>
</html>
