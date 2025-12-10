@props(['disabled' => false, 'error' => null])

@php
$classes = 'form-control ' . ($error ? 'border-red-500' : '');
@endphp

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
    {{ $slot }}
</select>
