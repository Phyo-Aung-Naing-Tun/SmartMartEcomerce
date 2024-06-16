@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full  text-white transition duration-75 rounded-lg p-2 group bg-[#0b216b]'
            : 'flex items-center w-full  text-white transition duration-75 rounded-lg p-2 group hover:bg-[#0b216b]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
