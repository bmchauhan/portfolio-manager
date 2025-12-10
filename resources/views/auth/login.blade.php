<x-layout>
    <x-slot:title>Login</x-slot>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Admin Login</h2>

            <x-input-error :messages="$errors->all()" class="mb-4" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="admin@example.com" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required placeholder="******************" />
                </div>

                <div class="flex items-center justify-between">
                    <x-primary-button class="w-full justify-center">
                        Sign In
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
