<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use App\Models\Loan;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_has_loans()
    {
        $book = Book::factory()->create();
        $loan = Loan::factory()->create(['book_id' => $book->id]);

        $this->assertTrue($book->loans->contains($loan));
    }

    
}
