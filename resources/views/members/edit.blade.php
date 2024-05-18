<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
</head>
<body>
    <h1>Edit Member</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('members.update', $member->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $member->name }}">
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $member->address }}">
        <br>
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="{{ $member->type }}">
        <br>
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="{{ $member->contact }}">
        <br>
        <button type="submit">Update Member</button>
    </form>

    <a href="{{ route('members.index') }}">Back to Members</a>
</body>
</html>
