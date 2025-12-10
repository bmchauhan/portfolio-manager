@props(['action', 'confirmText' => \App\Constants\LabelConstants::ARE_YOU_SURE_DELETE])

@php
    $uniqueId = 'delete_' . \Illuminate\Support\Str::random(10);
@endphp

<button type="button" onclick="confirmDelete_{{ $uniqueId }}()" {{ $attributes->merge(['class' => 'text-red-500 hover:text-red-700 text-sm focus:outline-none underline']) }}>
    {{ $slot->isEmpty() ? \App\Constants\LabelConstants::DELETE : $slot }}
</button>

@push('scripts')
    <form id="form-{{ $uniqueId }}" action="{{ $action }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <script>
        function confirmDelete_{{ $uniqueId }}() {
            Swal.fire({
                title: '{{ $confirmText }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-{{ $uniqueId }}').submit();
                }
            })
        }
    </script>
@endpush
