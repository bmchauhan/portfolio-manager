@props(['items', 'keyName' => null, 'limit' => 5])

@php
    $items = is_array($items) ? collect($items) : $items;
    $count = $items->count();
    $showItems = $items->take($limit);
    $remaining = $count - $limit;
@endphp

<div class="flex flex-wrap gap-1 items-center" x-data="{ open: false }">
    @foreach($showItems as $item)
        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
            {{ $keyName ? $item->$keyName : $item }}
        </span>
    @endforeach

    @if($remaining > 0)
        <div class="relative inline-block" 
             x-data="{ 
                 tooltipOpen: false,
                 tooltipPosition: { bottom: 0, left: 0 },
                 updatePosition() {
                     const rect = $el.getBoundingClientRect();
                     this.tooltipPosition = { 
                         bottom: window.innerHeight - rect.top + 10,
                         left: rect.left + (rect.width / 2) 
                     };
                 }
             }"
             @mouseenter="
                 updatePosition();
                 tooltipOpen = true;
             " 
             @mouseleave="tooltipOpen = false">
            
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-600 cursor-pointer hover:bg-gray-200 transition-colors whitespace-nowrap">
                +{{ $remaining }} more
            </span>
            
            <template x-teleport="body">
                <div x-show="tooltipOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-1"
                     :style="`bottom: ${tooltipPosition.bottom}px; left: ${tooltipPosition.left}px`"
                     class="fixed z-[9999] transform -translate-x-1/2 w-72 p-3 bg-white rounded-lg shadow-xl border border-gray-200 pointer-events-none"
                     style="display: none;">
                     
                    <div class="flex flex-wrap gap-1">
                        @foreach($items as $item)
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100">
                                 {{ $keyName ? $item->$keyName : $item }}
                            </span>
                        @endforeach
                    </div>
                    
                    <!-- Arrow -->
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-3 h-3 bg-white border-r border-b border-gray-200"></div>
                </div>
            </template>
        </div>
    @endif
</div>
