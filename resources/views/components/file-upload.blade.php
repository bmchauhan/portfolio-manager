@props([
    'name',
    'label' => null,
    'id' => null,
    'previewUrl' => null,
    'fileName' => null,
    'removeName' => null,
    'helpText' => null,
    'accept' => '*/*',
    'isImage' => false,
    'useCard' => true,
    'labelInside' => false,
])

@php
    $id = $id ?? $name;
    $hasPreview = !empty($previewUrl);
    
    // Determine file type icon
    $fileStr = $fileName ?? $previewUrl ?? '';
    // Remove query string if present (common in signed URLs or versioning)
    if (str_contains($fileStr, '?')) {
        $fileStr = explode('?', $fileStr)[0];
    }
    $extension = strtolower(pathinfo($fileStr, PATHINFO_EXTENSION));
    
    // File Type Flags
    $isPdf = $extension === 'pdf';
    $isWord = in_array($extension, ['doc', 'docx', 'txt', 'rtf']);
    $isExcel = in_array($extension, ['xls', 'xlsx', 'csv']);
    $isZip = in_array($extension, ['zip', 'rar', '7z', 'tar', 'gz']);
    $isCode = in_array($extension, ['php', 'js', 'css', 'html', 'json', 'sql', 'xml']);
    $isVideo = in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'mkv']);
    $isAudio = in_array($extension, ['mp3', 'wav', 'ogg', 'm4a']);
    
    // Image detection
    $isImageFile = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'tiff']);
    $showImagePreview = ($isImage || $isImageFile) && !$isPdf && !$isWord && !$isExcel && !$isZip && !$isCode && !$isVideo && !$isAudio;
@endphp

<div class="mb-4">
    @if($label && !$labelInside)
        <x-input-label :for="$id" :value="$label" />
    @endif

    <div @class(['p-4 border border-gray-200 rounded-lg bg-white shadow-sm' => $useCard])>
        @if($label && $labelInside)
            <div class="mb-4">
                <x-input-label :for="$id" :value="$label" />
            </div>
        @endif

        @if($hasPreview)
            <div class="mb-4 p-4 border border-gray-200 rounded-lg flex items-start gap-4 bg-gray-50" x-data="{ markedForDeletion: false }">
                <div class="flex-shrink-0">
                    @if($showImagePreview)
                        <img src="{{ $previewUrl }}" alt="Preview" class="w-20 h-20 object-cover rounded bg-white border border-gray-200" :class="{ 'opacity-50 grayscale': markedForDeletion }">
                    @elseif($isPdf)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-red-500" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-pdf text-4xl"></i>
                        </div>
                    @elseif($isWord)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-blue-500" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-word text-4xl"></i>
                        </div>
                    @elseif($isExcel)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-green-600" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-excel text-4xl"></i>
                        </div>
                    @elseif($isZip)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-yellow-600" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-archive text-4xl"></i>
                        </div>
                    @elseif($isCode)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-700" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-code text-4xl"></i>
                        </div>
                    @elseif($isVideo)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-pink-500" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-video text-4xl"></i>
                        </div>
                    @elseif($isAudio)
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-purple-500" :class="{ 'opacity-50': markedForDeletion }">
                             <i class="fas fa-file-audio text-4xl"></i>
                        </div>
                    @else
                        <div class="w-20 h-20 flex items-center justify-center rounded bg-white border border-gray-200 text-gray-400" :class="{ 'opacity-50': markedForDeletion }">
                            <i class="fas fa-file text-4xl"></i>
                        </div>
                    @endif
                </div>
                
                <div class="flex-grow min-w-0 pt-1">
                    <div class="text-sm font-medium text-gray-900 truncate" title="{{ $fileName ?? basename($previewUrl) }} (Type: {{ $extension }})">
                        {{ $fileName ?? basename($previewUrl) }}
                    </div>
                    
                    <div class="mt-2 flex items-center gap-4">
                        <a href="{{ $previewUrl }}" target="_blank" class="inline-flex items-center text-xs font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-150">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            View
                        </a>

                        @if($removeName)
                            <label class="inline-flex items-center text-xs font-medium text-red-600 hover:text-red-500 cursor-pointer transition-colors duration-150">
                                <input type="checkbox" 
                                       name="{{ $removeName }}" 
                                       value="1" 
                                       class="hidden" 
                                       @change="markedForDeletion = $event.target.checked">
                                <span x-show="!markedForDeletion" class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </span>
                                <span x-show="markedForDeletion" class="flex items-center" style="display: none;">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Undo
                                </span>
                            </label>
                        @endif
                    </div>
                    <div x-show="markedForDeletion" class="mt-1 text-xs text-red-500" style="display: none;">
                        Marked for deletion
                    </div>
                </div>
            </div>
        @endif

        <div class="relative">
            <input type="file" 
                   id="{{ $id }}" 
                   name="{{ $name }}" 
                   accept="{{ $accept }}"
                   {{ $attributes->merge(['class' => 'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer']) }}>
        </div>
        
        @if($helpText)
            <p class="mt-1 text-xs text-gray-500">{{ $helpText }}</p>
        @endif
    </div>
</div>