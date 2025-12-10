@props(['disabled' => false, 'error' => null])

@php
$classes = 'form-control ' . ($error ? 'border-red-500' : '');
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
