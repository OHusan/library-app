@props(['tags'])

<form method="POST" id="form_book" class="hidden p-8 border broder-blue-600 max-w-xl w-full" action="/new-book">
    @csrf

    <x-input-label>Title</x-input-label>
    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
        autofocus />

    <x-input-label>Author</x-input-label>
    <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')"
        required autofocus />

    <x-input-label>Published year</x-input-label>
    <x-text-input id="published_year" class="block mt-1 w-full" type="date" name="published_year"
        :value="old('published_year')" required autofocus />

    <x-input-label>Description</x-input-label>
    <textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')"></textarea>

    <x-input-label>Tag</x-input-label>
    <x-dropdown align="right" width="100" contentClasses="py-1 h-[150px] overflow-auto bg-white">
        <x-slot name="trigger">
            <button type="button"
                class="inline-flex w-full items-center justify-between px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <p x-text="selectedTagName">Hello</p>
                <input type="hidden" id="tag_id" name="tag_id" x-model="selectedTagId" />
                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
