<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Book;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateVendorAboutOrder
{
    /**
     * Create the event listener.
     */
    public function __construct(public Book $book)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        info("Vendor was updated about order". $event->books->title);
    }
}
