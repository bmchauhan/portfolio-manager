<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-link-danger']) }}>
    {{ $slot }}
</button>
