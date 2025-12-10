<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
    
    // Display generic validation error if any
    @if ($errors->any() && !Session::has('error'))
        toastr.error("{{ \App\Constants\MessageConstants::VALIDATION_ERROR }}");
    @endif
</script>
