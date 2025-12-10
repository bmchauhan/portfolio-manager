@props(['active' => false])

<div x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    <button @click="open = !open" {{ $attributes->merge(['class' => 'flex items-center w-full px-4 py-2 text-gray-100 rounded-md bg-gray-900 bg-opacity-25 hover:bg-gray-700 hover:bg-opacity-25 focus:outline-none']) }}>
        {{ $trigger }}
        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 ml-auto transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>

    <div x-show="open" class="bg-gray-800">
        {{ $slot }}
    </div>
</div>
