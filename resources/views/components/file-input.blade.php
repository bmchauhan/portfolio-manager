@props(['disabled' => false, 'error' => null])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 ' . ($error ? 'text-red-600' : '')]) !!}>
