@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-bold mb-4">{{ $member->name }} kölcsönzései</h1>

    <h2 class="text-xl font-semibold mb-2">Aktuális kölcsönzések</h2>
    @if($currentBorrowings->isEmpty())
        <p>Nincsenek aktuális kölcsönzések.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Könyv</th>
                    <th class="py-2 px-4 border-b">Kölcsönzés dátuma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($currentBorrowings as $borrowing)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $borrowing->book->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $borrowing->borrowed_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2 class="text-xl font-semibold mt-4 mb-2">Korábbi kölcsönzések</h2>
    @if($pastBorrowings->isEmpty())
        <p>Nincsenek korábbi kölcsönzések.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Könyv</th>
                    <th class="py-2 px-4 border-b">Kölcsönzés dátuma</th>
                    <th class="py-2 px-4 border-b">Visszahozás dátuma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pastBorrowings as $borrowing)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $borrowing->book->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $borrowing->borrowed_at }}</td>
                        <td class="py-2 px-4 border-b">{{ $borrowing->returned_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
