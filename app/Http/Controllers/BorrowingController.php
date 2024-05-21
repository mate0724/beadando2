<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('book', 'member')->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('available', true)->get();
        $members = Member::all();

        return view('borrowings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrowed_at' => 'required|date',
        ]);

        $member = Member::findOrFail($request->member_id);

        // Ellenőrizzük, hogy a tag kölcsönözhet-e még könyvet
        $borrowedBooksCount = Borrowing::where('member_id', $request->member_id)
                                        ->whereNull('returned_at')
                                        ->count();

        $maxBooksAllowed = match($member->type) {
            'student' => 5,
            'teacher' => PHP_INT_MAX, // tetszőleges számú könyv
            'external' => 4,
            default => 2,
        };

        if ($borrowedBooksCount >= $maxBooksAllowed) {
            return redirect()->back()->withErrors(['member_id' => 'This member has reached the borrowing limit.']);
        }

        // Visszahozás dátumának kiszámítása a tag típusa alapján
        $dueDate = match($member->type) {
            'student' => Carbon::parse($request->borrowed_at)->addMonths(2),
            'teacher' => Carbon::parse($request->borrowed_at)->addYear(),
            'external' => Carbon::parse($request->borrowed_at)->addMonth(),
            default => Carbon::parse($request->borrowed_at)->addWeeks(2),
        };

        Borrowing::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'borrowed_at' => $request->borrowed_at,
            'due_date' => $dueDate,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Book borrowed successfully.');
    }
}
