<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowings By Members</title>
</head>
<body>
<div >
    <h1 >{{ $member->name }} kölcsönzései</h1>

    <h2 ">Aktuális kölcsönzések</h2>
    @if($currentBorrowings->isEmpty())
        <p>Nincsenek aktuális kölcsönzések.</p>
    @else
        <table >
            <thead>
                <tr>
                    <th>Könyv</th>
                    <th>Kölcsönzés dátuma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($currentBorrowings as $borrowing)
                    <tr>
                        <td>{{ $borrowing->book->title }}</td>
                        <td>{{ $borrowing->borrowed_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>Korábbi kölcsönzések</h2>
    @if($pastBorrowings->isEmpty())
        <p>Nincsenek korábbi kölcsönzések.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Könyv</th>
                    <th>Kölcsönzés dátuma</th>
                    <th>Visszahozás dátuma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pastBorrowings as $borrowing)
                    <tr>
                        <td>{{ $borrowing->book->title }}</td>
                        <td>{{ $borrowing->borrowed_at }}</td>
                        <td>{{ $borrowing->returned_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>


