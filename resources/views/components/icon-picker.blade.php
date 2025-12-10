@props(['name', 'value' => ''])

<div x-data="{
    showModal: false,
    selectedIcon: '{{ $value }}',
    search: '',
    icons: [
        'fab fa-php', 'fab fa-laravel', 'fab fa-js', 'fab fa-vuejs', 'fab fa-react', 'fab fa-angular',
        'fab fa-html5', 'fab fa-css3-alt', 'fab fa-sass', 'fab fa-less', 'fab fa-bootstrap',
        'fab fa-node', 'fab fa-node-js', 'fab fa-npm', 'fab fa-yarn', 'fab fa-gulp', 'fab fa-grunt',
        'fab fa-docker', 'fab fa-aws', 'fab fa-digital-ocean', 'fab fa-jenkins', 'fab fa-gitlab', 'fab fa-github',
        'fab fa-bitbucket', 'fab fa-jira', 'fab fa-trello', 'fab fa-slack', 'fab fa-discord',
        'fab fa-linux', 'fab fa-ubuntu', 'fab fa-centos', 'fab fa-redhat', 'fab fa-fedora',
        'fab fa-windows', 'fab fa-apple', 'fab fa-android', 'fab fa-swift', 'fab fa-java', 'fab fa-python',
        'fab fa-rust', 'fab fa-go', 'fab fa-wordpress', 'fab fa-drupal', 'fab fa-joomla', 'fab fa-magento',
        'fab fa-shopify', 'fab fa-stripe', 'fab fa-paypal', 'fab fa-bitcoin', 'fab fa-markdown',
        'fab fa-git-alt',
        'fas fa-database', 'fas fa-server', 'fas fa-code', 'fas fa-terminal', 'fas fa-bug', 'fas fa-laptop-code',
        'fas fa-mobile-alt', 'fas fa-desktop', 'fas fa-tablet-alt', 'fas fa-cloud', 'fas fa-cloud-upload-alt',
        'fas fa-project-diagram', 'fas fa-sitemap', 'fas fa-network-wired', 'fas fa-wifi', 'fas fa-lock',
        'fas fa-unlock', 'fas fa-key', 'fas fa-user-secret', 'fas fa-user-shield', 'fas fa-shield-alt',
        'fas fa-cogs', 'fas fa-tools', 'fas fa-wrench', 'fas fa-hammer', 'fas fa-pencil-ruler', 'fas fa-paint-brush',
        'fas fa-palette', 'fas fa-layer-group', 'fas fa-cube', 'fas fa-cubes', 'fas fa-box', 'fas fa-boxes',
        'fas fa-chart-line', 'fas fa-chart-bar', 'fas fa-chart-pie', 'fas fa-chart-area', 'fas fa-table',
        'fas fa-file-code', 'fas fa-file-alt', 'fas fa-file-pdf', 'fas fa-file-word', 'fas fa-file-excel',
        'fas fa-envelope', 'fas fa-paper-plane', 'fas fa-at', 'fas fa-phone', 'fas fa-address-book',
        'fas fa-globe', 'fas fa-map-marker-alt', 'fas fa-location-arrow', 'fas fa-search', 'fas fa-filter',
        'fas fa-sort', 'fas fa-sync', 'fas fa-history', 'fas fa-clock', 'fas fa-calendar-alt', 'fas fa-check',
        'fas fa-check-circle', 'fas fa-check-square', 'fas fa-times', 'fas fa-times-circle', 'fas fa-plus',
        'fas fa-plus-circle', 'fas fa-minus', 'fas fa-minus-circle', 'fas fa-exclamation', 'fas fa-exclamation-circle',
        'fas fa-exclamation-triangle', 'fas fa-info', 'fas fa-info-circle', 'fas fa-question', 'fas fa-question-circle',
        'fas fa-user', 'fas fa-users', 'fas fa-user-tie', 'fas fa-briefcase', 'fas fa-building', 'fas fa-graduation-cap',
        'fas fa-star', 'fas fa-heart', 'fas fa-thumbs-up', 'fas fa-thumbs-down', 'fas fa-comment', 'fas fa-comments'
    ],
    get filteredIcons() {
        if (!this.search) return this.icons;
        return this.icons.filter(i => i.includes(this.search.toLowerCase()));
    }
}">
    <!-- Input hidden -->
    <input type="hidden" name="{{ $name }}" x-model="selectedIcon">

    <!-- Preview & Button -->
    <div class="flex items-center">
         <div class="w-10 h-10 flex items-center justify-center bg-gray-200 rounded mr-4 text-xl">
              <template x-if="selectedIcon">
                  <i :class="selectedIcon"></i>
              </template>
              <template x-if="!selectedIcon">
                  <i class="fas fa-icons text-gray-400"></i>
              </template>
         </div>
         <x-primary-button type="button" @click="showModal = true">
             Choose Icon
         </x-primary-button>
    </div>

    <!-- Modal -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
         
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 lg:w-1/2 max-h-[80vh] flex flex-col"
             @click.away="showModal = false">
            
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-semibold">Select Icon</h3>
                <button type="button" @click="showModal = false" class="text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="p-4 border-b">
                <input type="text" x-model="search" placeholder="Search icons..." class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="p-4 grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-4 overflow-y-auto">
                <template x-for="icon in filteredIcons" :key="icon">
                    <button type="button" 
                            @click="selectedIcon = icon; showModal = false"
                            class="flex flex-col items-center justify-center p-2 hover:bg-indigo-100 rounded transition duration-150 ease-in-out h-20 w-full">
                        <i :class="icon + ' text-2xl mb-2 text-gray-700'"></i>
                        <span class="text-xs text-gray-500 truncate w-full text-center" :title="icon" x-text="icon.replace('fa-', '')"></span>
                    </button>
                </template>
                <div x-show="filteredIcons.length === 0" class="col-span-full text-center text-gray-500">
                    No icons found.
                </div>
            </div>
        </div>
    </div>
</div>
