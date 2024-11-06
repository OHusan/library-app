@props(['book', 'loan'])

@php
    use Carbon\Carbon;
    $date = Carbon::parse($book->published_year);

    $isLoaned = $loan && Carbon::parse($loan->due_date)->isFuture();
@endphp

<x-panel>
    <a href="/book/{{ $book->id }}" class="flex flex-col text-center">

        <span class="self-start text-sm">{{ $date->year }}</span>

        <div class="py-8">
            <h3 class="group-hover:text-blue-800 text-xl  font-bold transition-colors duration-300">
                {{ $book->title }}
            </h3>
            <p class="text-sm mt-4">{{ $book->author }}</p>
            @if ($isLoaned && $loan)
                <p>{{$loan->due_date}}</p>
            @endif
        </div>
    </a>

    <div class="flex justify-between items-center mt-auto">
        <x-tag size="small" :tag='$book->tag->name' />
        @if ($isLoaned)
            <x-tag size="small" :loaned="true" />
        @endif
    </div>
</x-panel>
