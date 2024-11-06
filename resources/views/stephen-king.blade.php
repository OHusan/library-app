<x-app-layout>
    <h1>Hello Pokemon</h1>

    <div class="grid grid-cols-3 gap-4">

        @foreach ($data['data'] as $book)
            <x-panel>
                <a href="/book/{{ $book['Title'] }}" class="flex flex-col text-center">

                    <span class="self-start text-sm">{{ $book['Year'] }}</span>

                    <div class="py-8">
                        <h3 class="group-hover:text-blue-800 text-xl  font-bold transition-colors duration-300">
                            {{ $book['Title'] }}
                        </h3>
                        <p class="text-sm mt-4">Stephen King</p>
                    </div>
                </a>
            </x-panel>
        @endforeach
    </div>

</x-app-layout>
