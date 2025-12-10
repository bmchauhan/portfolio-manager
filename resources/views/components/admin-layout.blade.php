@props(['title' => 'Admin Panel'])

<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex h-screen bg-gray-100" x-data="{ sidebarOpen: false }">
        <x-admin.sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-admin.header />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</x-layout>