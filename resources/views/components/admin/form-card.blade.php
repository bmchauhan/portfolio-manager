@props(['action', 'method' => 'POST', 'hasFiles' => false])

<div class="mt-8">
    <x-admin.card 
        tag="form" 
        :action="$action" 
        :method="in_array(strtoupper($method), ['GET', 'POST']) ? strtoupper($method) : 'POST'"
        :enctype="$hasFiles ? 'multipart/form-data' : null"
        {{ $attributes }}
    >
        @csrf
        @if(!in_array(strtoupper($method), ['GET', 'POST']))
            @method($method)
        @endif

        {{ $slot }}
    </x-admin.card>
</div>
