<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Member') }}
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
        <select id="type" name="type">
            <option value="student" <?php if ($member->type=="student")echo" selected"; ?>>student</option>
            <option value="faculty"<?php if ($member->type=="faculty")echo" selected"; ?>>faculty</option>
            <option value="external"<?php if ($member->type=="external")echo" selected"; ?>>external</option>
            <option value="default"<?php if ($member->type=="default")echo" selected"; ?>>default</option>
        </select>
        <br>
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="{{ $member->contact }}">
        <br>
        <button type="submit" class="mybutton">Update Member</button>
    </form>
            </div>
        </div>
    </div>
</x-app-layout>