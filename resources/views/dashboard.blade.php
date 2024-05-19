<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        Welcome to your Dashboard
                    </div>

                    <div class="mt-6 text-gray-500">
                        Choose an action:
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('books.create') }}" class="btn btn-primary">
                                Add Books
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('books.index') }}" class="btn btn-primary">
                                List Books
                            </a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('members.create') }}" class="btn btn-primary">
                                Add Members
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('members.index') }}" class="btn btn-primary">
                                List Members
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('books.index') }}" class="btn btn-danger">
                                Delete Books
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
