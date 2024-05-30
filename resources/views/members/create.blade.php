<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Member') }}
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
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('members.store') }}">
                    @csrf
                    
                    
                    <div class="mb-4">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                    <br>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}">
                    <br>
                    <label for="type">Type:</label>
                    <select id="type" name="type">
                        <option value="student">student</option>
                        <option value="faculty">faculty</option>
                        <option value="external">external</option>
                        <option value="default">default</option>
                    </select>
                    <br>
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" value="{{ old('contact') }}">
                    <br>
                    <button type="submit" class="mybutton">Add Member</button>
                    </div>


                    <a href="{{ route('members.index') }}" class="mybutton">Back to Members</a>


                </form>
            </div>
        </div>
    </div>
</x-app-layout>