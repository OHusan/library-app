@php
    $classes = 'px-3 py-2  border border-gray-400 rounded-2xl';
@endphp

<button {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</button>
