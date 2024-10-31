@php
    use Carbon\Carbon;

    $nowDate = Carbon::now()->format('Y-m-d');
    $dueDate = $loan ? Carbon::parse($loan->due_date)->format('Y-m-d') : $nowDate;

    $currentDate = max($dueDate, $nowDate);
@endphp

<x-app-layout>
    <h1 class="text-6xl text-center">{{ $book->title }}</h1>

    <div class="mt-8 text-2xl">
        <p>Author: {{ $book->author }}</p>
        <p>Published date: {{ $book->published_year }}</p>
        <p>Gener: {{ $book->tag->name }}</p>
        <p class="text-green-500">
            <span class="text-black">Description:</span>
            {{ $book->description }}
        </p>
    </div>

    <div class="flex flex-col items-center justify-center mt-8 gap-4">
        @if ($loan && $dueDate > $nowDate)
            <p class="text-xl">Loaned until: {{ $loan->due_date }}</p>
        @endif

        @auth
            <form method="POST" action="/book" class="flex flex-col gap-4">
                @csrf

                <input type="hidden" name="book_id" value={{ $book->id }} />
                <input type="hidden" name="user_id" value={{ Auth::user()->id }} />
                <input type="hidden" name="loaned_at" value={{ Carbon::now() }} />

                <input type="date" name="due_date" min="{{ $currentDate }}" />

                <x-button type="submit">Loan book</x-button>
            </form>
        @endauth
    </div>
</x-app-layout>
