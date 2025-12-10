@props(['active' => false])

<a {{ $attributes->merge(['class' => 'flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700 rounded-md ' . ($active ? 'bg-gray-700' : '')]) }}>
    {{ $slot }}
</a>