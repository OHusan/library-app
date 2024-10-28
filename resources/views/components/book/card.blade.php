<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">Name of book</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl  font-bold transition-colors duration-300">
            {{-- <a href="{{ $job->url }}" target="_blank">{{ $job->title }}</a> --}}
            Title
        </h3>
        <p class="text-sm mt-4">Author of book</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div class="space-x-1">
            @for ($i = 0; $i < 3; $i++)
                <x-tag size="small" />
            @endfor
        </div>

        {{-- <x-employer-image :employer={{ $job->employer }} /> --}}

    </div>
</x-panel>
