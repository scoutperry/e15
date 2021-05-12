<?php

use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Book;
use App\Models\User;

class Booktest extends DuskTestCase
{
    use withFaker;
    use DatabaseMigrations;

    //adjust blade files
    public function testLoadingBookWithAuthor()
    {
        $this->browse(function (Browser $browser) {
            $book = Book::factory()->has(User::factory())->create();
            $user = $book->users()->first();

            $browser->loginAs($user->id)
                    ->visit('/books/' . $book->slug)
                    ->assertSee($book->title)
                    ->assertPresent('@author-info');
        });
    }

    public function testLoadingBookWithNoAuthor()
    {
        $this->browse(function (Browser $browser) {
            $book = Book::factory()->withoutAuthor()->has(User::factory())->create();
            $user = $book->users()->first();
            $browser->loginAs($user->id)
                    ->visit('/books/' . $book->slug)
                    ->assertMissing('@author-info');
        });
    }
    public function testAddingBook()
    {
        $this->browse(function (Browser $browser) {
            $book = Book::factory()->make();
            $user = User::factory()->create();
            $browser->loginAs($user->id)
                    ->visit('/books/create')
                    ->value('@title-input' . $book->title)
                    ->value('@slug-input' . $book->slug)
                    ->value('@published-year-input' . $book->published_year)
                    ->value('@cover-url-input' . $book->cover_url)
                    ->value('@info-url-input' . $book->info_url)
                    ->value('@purchase-url-input' . $book->purchase_url)
                    ->value('@author-id-select' . $book->author_id)
                    ->value('@description-textarea' . $book->description)
                    ->click('@add-book-button')
                    ->assertPathIs('/books/create')
                    ->assertSeeIn('@flash-alert', $book->title);
        });
    }

    public function testAddingBookWithExistingSlug()
    {
        $this->browse(function (Browser $browser) {
            $book = Book::factory()->create();
            $user = User::factory()->create();
            $browser->loginAs($user->id)
                    ->visit('/books/create')
                    ->value('@title-input' . $book->title)
                    ->value('@slug-input' . $book->slug) //existing slug?
                    ->value('@published-year-input' . $book->published_year)
                    ->value('@cover-url-input' . $book->cover_url)
                    ->value('@info-url-input' . $book->info_url)
                    ->value('@purchase-url-input' . $book->purchase_url)
                    ->value('@author-id-select' . $book->author_id)
                    ->value('@description-textarea' . $book->description)
                    ->click('@add-book-button')
                    ->assertPresent('@error-field-slug');
        });
    }

    public function testDeletingBook()
    {
        $this->browse(function (Browser $browser) {
            $book = Book::factory()->create();
            $user = User::factory()->create();
            $browser->loginAs($user->id)
                    ->visit('/books/'.$book->slug)
                    ->click('@delete-button')
                    ->click('@confirm-delete-button')
                    ->assertSeeIn('@flash-alert', $book->title)
                    ->assertSeeIn('@flash-alert', 'removed')
                    ->assertPresent('@empty-books');
        });
    }

    public function testUpdatingBook()
    {
        $this->browse(function (Browser $browser) {
            $book = Book::factory()->create();

            $updatedTitle = $book->title.' 2';
            $user = User::factory()->create();
            $browser->loginAs($user->id)
                    ->visit('/books/'.$book->slug)
                    ->click('@edit-button')
                    ->type('@title-input', $updatedTitle)
                    ->click('@update-button')
                    ->assertSeeIn('@flash-alert', 'Your updates were saved')
                    ->assertSee($updatedTitle);
        });
    }

}