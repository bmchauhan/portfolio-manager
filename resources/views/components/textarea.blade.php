@props(['disabled' => false, 'error' => null])

@php
$classes = 'form-control ' . ($error ? 'border-red-500' : '');
@endphp

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>{{ $slot }}</textarea>
