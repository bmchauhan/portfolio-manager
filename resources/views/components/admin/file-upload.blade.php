@props(['label', 'name', 'accept' => '', 'error' => null, 'file' => null, 'deleteRoute' => null, 'isImage' => false])

<div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">
    <div class="flex justify-between items-start mb-2">
        <x-input-label :for="$name" class="!mb-0 text-gray-700 font-semibold">
            {{ $label }}
            @if($attributes->has('required'))
                <span class="text-red-500">*</span>
            @endif
        </x-input-label>
    </div>

    <div class="space-y-4">
        {{-- Current File Display --}}
        @if($file)
            <div class="flex items-center p-3 bg-white rounded-md border border-gray-200 shadow-sm">
                @if($isImage)
                    <div class="flex-shrink-0 mr-4">
                        <img src="{{ $file->url }}" alt="{{ $label }}" class="h-16 w-16 rounded-full object-cover border border-gray-200 shadow-sm">
                    </div>
                @else
                    <div class="flex-shrink-0 h-16 w-16 mr-4 flex items-center justify-center bg-gray-100 rounded-full border border-gray-200">
                        <i class="fas fa-file-pdf text-2xl text-red-500"></i>
                    </div>
                @endif

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate mb-1">
                        {{ $file->original_name }}
                    </p>
                    <div class="flex items-center space-x-4">
                        <a href="{{ $file->url }}" target="_blank" class="text-xs font-medium text-indigo-600 hover:text-indigo-900 flex items-center transition-colors duration-200">
                            <i class="fas fa-external-link-alt mr-1.5"></i> View
                        </a>
                        
                        @if($deleteRoute)
                            <x-admin.delete-button :action="$deleteRoute" class="!text-red-500 hover:!text-red-700 !no-underline flex items-center !text-xs !font-medium transition-colors duration-200">
                                <i class="fas fa-trash-alt mr-1.5"></i> Delete
                            </x-admin.delete-button>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        {{-- Upload Input --}}
        <div class="@if($file) mt-3 @endif">
             <x-file-input :id="$name" :name="$name" :accept="$accept" :error="$error" class="w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-indigo-50 file:text-indigo-700
                hover:file:bg-indigo-100 transition-colors duration-200" />
            
            <p class="mt-2 text-xs text-gray-500">
                {{ $isImage ? 'Upload a new image to replace the current one.' : 'Upload a new file to replace the current one.' }}
            </p>
            <x-input-error :messages="$error" />
        </div>
    </div>
</div>
