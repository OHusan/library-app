@php
    dd($books[0]);
@endphp

<x-app-layout>
    <h1 class="text-9xl">Hello world</h1>

    <div class="grid lg:grid-cols-3 gap-3 py-9">
        @foreach ($books as $book)
            <x-book.card :$book :$loan />
        @endforeach
    </div>
</x-app-layout>
