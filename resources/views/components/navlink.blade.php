@props(['href'])

@php
    $current = url()->current();
    $target = url($href);
    $isActive = $current === $target;
@endphp

<a href="{{ $target }}"
    class="px-3 py-2 text-[18px] font-medium rounded-md {{ $isActive ? 'bg-gray-700 text-white' : 'text-black hover:bg-gray-400 hover:text-white' }}">
    {{ $slot }}
</a>
