@php
    $showModal = false;
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
        <p class="text-xl">Loaned until: {{ $loan->due_date }}</p>
        <x-button onclick="add()">Loan book</x-button>
    </div>
</x-app-layout>

<script>
    const add = () => {
        console.log('test')
    }
</script>
