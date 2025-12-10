@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .note-editor .note-toolbar {
            background-color: #f3f4f6; /* Gray-100 */
            border-bottom: 1px solid #e5e7eb; /* Gray-200 */
        }
        .note-editor {
            border-color: #d1d5db !important; /* Gray-300 */
            border-radius: 0.375rem; /* Rounded-md */
        }
        /* Revert tailwind reset for lists inside summernote */
        .note-editable ul,
        .note-editable ol {
            padding-left: 1.25rem;
            margin-bottom: 1rem;
        }
        .note-editable ul {
            list-style-type: disc;
        }
        .note-editable ol {
            list-style-type: decimal;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('js/admin/summernote-init.js') }}"></script>
@endpush