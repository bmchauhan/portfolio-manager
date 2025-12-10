@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'form-error list-none p-0 m-0']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
