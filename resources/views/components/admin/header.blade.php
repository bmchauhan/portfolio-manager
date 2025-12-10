<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    
    <div class="flex items-center" x-data="{ open: false }">
        <div class="relative">
            <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 focus:outline-none">
                @if(Auth::user()->personalDetail && Auth::user()->personalDetail->avatar)
                    <img src="{{ Auth::user()->personalDetail->avatar->url }}" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                @else
                    <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">
                        {{ substr((Auth::user()->personalDetail && Auth::user()->personalDetail->full_name) ? Auth::user()->personalDetail->full_name : Auth::user()->name, 0, 1) }}
                    </div>
                @endif
                <span class="font-medium">
                    {{ (Auth::user()->personalDetail && Auth::user()->personalDetail->full_name) ? Auth::user()->personalDetail->full_name : Auth::user()->name }}
                </span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ LabelConstants::PROFILE }}
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        {{ LabelConstants::LOGOUT }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>