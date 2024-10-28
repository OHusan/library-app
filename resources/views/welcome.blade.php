<x-app-layout>
    <h1 class="text-9xl">Hello world</h1>

    <div class="grid lg:grid-cols-3 gap-3 mt-9">
        @for ($i = 0; $i < 3; $i++)
            <x-book.card />
        @endfor
    </div>
</x-app-layout>
