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

    <div class="mt-8 max-w-md mx-auto">
        @if ($loan && $dueDate > $nowDate)
            <p class="text-xl">Loaned until: {{ $loan->due_date }}</p>
        @endif

        @auth
            <div class="space-y-4">
                <form method="POST" action="/book" class="flex flex-col gap-4">
                    @csrf

                    <input type="hidden" name="book_id" value={{ $book->id }} />
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }} />
                    <input type="hidden" name="loaned_at" value={{ Carbon::now() }} />

                    <input type="date" name="due_date" min="{{ $currentDate }}" />

                    <x-button type="submit">Loan book</x-button>
                </form>

                @if (auth()->check() && auth()->id() === 13)
                    <div x-data="{ open: false }">
                        <x-button class="w-full" @click="open = ! open">Update book</x-button>

                        <form action="/book/{{ $book->id }}" method="POST" x-show="open"
                            class="p-8 border broder-blue-600 min-w-xl w-full mt-6">
                            @csrf
                            @method('PUT')

                            <x-input-label>Title</x-input-label>
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title', $book->title)" required autofocus />

                            <x-input-label>Author</x-input-label>
                            <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                                :value="old('author', $book->author)" required autofocus />

                            <x-input-label>Published year</x-input-label>
                            <x-text-input id="published_year" class="block mt-1 w-full" type="date" name="published_year"
                                :value="old('published_year', $book->published_year)" required autofocus />

                            <x-input-label>Description</x-input-label>
                            <textarea id="description" class="block mt-1 w-full" name="description">{{ old('description', $book->description) }}</textarea>

                            <x-input-label>Tag</x-input-label>
                            <x-dropdown align="right" width="100"
                                contentClasses="py-1 h-[150px] overflow-auto bg-white">
                                <x-slot name="trigger">
                                    <button type="button"
                                        class="inline-flex w-full items-center justify-between px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <p x-text="selectedTagName || '{{ $book->tag->name ?? 'Select a tag' }}'"></p>
                                        <input type="hidden" id="tag_id" name="tag_id"
                                            :value="selectedTagId || '{{ $book->tag->id ?? 1 }}'" />
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    @foreach ($tags as $tag)
                                        <p class="px-3 py-1 cursor-pointer hover:bg-black/5"
                                            @click="selectedTagName = '{{ $tag->name }}'; selectedTagId = '{{ $tag->id }}'">
                                            {{ $tag->name }}
                                        </p>
                                    @endforeach
                                </x-slot>
                            </x-dropdown>

                            <x-button type="submit" class="mt-4">Submit</x-button>
                        </form>
                    </div>
                @endif
            </div>
        @endauth
    </div>
</x-app-layout>
