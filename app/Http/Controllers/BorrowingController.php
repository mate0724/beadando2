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
        // Debugging - print the incoming request data
        // dd($request->all());

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrowed_at' => 'required|date',
        ]);

        $book = Book::findOrFail($request->book_id);
        $member = Member::findOrFail($request->member_id);


        $borrowedCount = Borrowing::where('book_id', $book->id)->whereNull('returned_at')->count();

        if ($borrowedCount >= $book->copies) {
            return redirect()->back()->withErrors(['error' => 'Nincs elérhető példány a könyvből.']);
        }


        $borrowedAt = Carbon::parse($request->borrowed_at);
        $dueDate = match ($member->type) {
            'student' => $borrowedAt->copy()->addMonths(2),
            'faculty' => $borrowedAt->copy()->addYear(),
            'external' => $borrowedAt->copy()->addMonth(),
            default => $borrowedAt->copy()->addWeeks(2),
        };

        Borrowing::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'borrowed_at' => $borrowedAt,
            'due_date' => $dueDate,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Book borrowed successfully.');
    }
    
    public function update($id)
    {
        die("valami szöveget");
        $borrowing = Borrowing::find($id);
        $due = $borrowing->due_date;
        $now = time();
        
        $borrowing->returned_at = $now;
        
        $borrowing->save();
        
        
        $late = $now > $due ? true : false;
        
        
        return view('dashboard');
        /* return route('borrowings.index')->with('success', 'Returned successfully.'.($late ? " You LATE!" : " You returned in time.")); */
    }

    public function show($id)
    {
        $borrowing = Borrowing::findOrFail($id);    
        return view('borrowings.show', compact('borrowing'));
    }

    public function returnbook($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        $now = Carbon::now();

        $borrowing->returned_at = $now;
        
        $borrowing->save();

        
        $late = $borrowing->due_date<$now;
        if($late)
        {
            session()->flash('late', 'The return was late.');
        }
        else
        {
            session()->flash('intime', 'The return was in time.');
        }

        return redirect()->route('borrowings.index');
    }

/*     public function list($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        return $borrowing;
    } */
}
