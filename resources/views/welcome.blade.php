<x-app-layout>
    <h1 class="text-9xl text-center">Hello world</h1>

    @auth
        <div class="flex items-center justify-center flex-col gap-5">
            <x-button id="add_book">Add book</x-button>

            <x-book.form :$tags/>
        </div>

        <div class="grid lg:grid-cols-3 gap-3 py-9">
            @foreach ($books as $book)
                @php
                    $loan = $loans
                        ->where('book_id', $book->id)
                        ->sortByDesc('due_date')
                        ->first();
                @endphp

                <x-book.card :$book :$loan />
            @endforeach
        </div>
    @endauth
</x-app-layout>

<script>
    const showForm = document.getElementById('add_book');
    const bookForm = document.getElementById('form_book');

    showForm.addEventListener('click', () => {
        bookForm.classList.toggle('!block')
    })
</script>
