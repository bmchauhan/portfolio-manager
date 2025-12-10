<x-admin-layout :title="LabelConstants::ADD_NEW . ' ' . LabelConstants::SKILL">
    <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::ADD_NEW }} {{ LabelConstants::SKILL }}</h3>

    <div class="mt-8">
        <form action="{{ route('admin.skills.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="LabelConstants::NAME">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="name" name="name" :value="old('name')" required :error="$errors->has('name')" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <x-input-label for="category" :value="LabelConstants::CATEGORY">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <div class="relative">
                        <x-select id="category" name="category" required :error="$errors->has('category')">
                            <option value="">Select Category</option>
                            @foreach(OptionConstants::SKILL_CATEGORIES as $value => $label)
                                <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </x-select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('category')" />
                </div>

                <!-- Proficiency -->
                <div class="mb-4">
                    <x-input-label for="proficiency" :value="LabelConstants::PROFICIENCY" />
                    <div class="relative">
                        <x-select id="proficiency" name="proficiency" :error="$errors->has('proficiency')">
                            <option value="">Select Proficiency</option>
                            @foreach(OptionConstants::PROFICIENCY_LEVELS as $value => $label)
                                <option value="{{ $value }}" {{ old('proficiency', 'intermediate') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </x-select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('proficiency')" />
                </div>

                <!-- Icon Picker -->
                <div class="mb-4">
                    <x-input-label for="icon" value="Icon" />
                    <x-icon-picker name="icon" :value="old('icon')" />
                    <x-input-error :messages="$errors->get('icon')" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('admin.skills.index') }}" class="mr-2">
                    <x-secondary-button>
                        {{ LabelConstants::CANCEL }}
                    </x-secondary-button>
                </a>
                <x-primary-button>
                    {{ LabelConstants::SAVE }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
</x-admin-layout>
