<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Loan;
use App\Models\User;
use App\Models\Book;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_loan_belongs_to_user()
    {
        $user = User::factory()->create();
        $loan = Loan::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $loan->user);
    }

    public function test_loan_belongs_to_book()
    {
        $book = Book::factory()->create();
        $loan = Loan::factory()->create(['book_id' => $book->id]);

        $this->assertInstanceOf(Book::class, $loan->book);
    }

    
}

