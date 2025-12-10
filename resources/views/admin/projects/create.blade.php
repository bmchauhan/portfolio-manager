<x-admin-layout :title="LabelConstants::ADD_NEW . ' ' . LabelConstants::PROJECT">
    <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::ADD_NEW }} {{ LabelConstants::PROJECT }}</h3>

    <x-admin.form-card action="{{ route('admin.projects.store') }}" :hasFiles="true">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="mb-4">
                    <x-input-label for="title" :value="LabelConstants::PROJECT . ' Title'">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="title" name="title" type="text" class="block w-full mt-1" :value="old('title')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <x-input-label for="type" :value="LabelConstants::TYPE">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-select id="type" name="type" class="block w-full mt-1">
                        <option value="personal" {{ old('type') == 'personal' ? 'selected' : '' }}>{{ LabelConstants::PERSONAL }} (Learning purpose)</option>
                        <option value="client" {{ old('type') == 'client' ? 'selected' : '' }}>{{ LabelConstants::CLIENT }} (Freelance)</option>
                        <option value="company" {{ old('type') == 'company' ? 'selected' : '' }}>{{ LabelConstants::COMPANY }} (Employee)</option>
                    </x-select>
                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                </div>

                <!-- Skills & Tools -->
                <div class="mb-4">
                    <x-input-label for="skills_tools" :value="LabelConstants::SKILLS_TOOLS" />
                    <x-choices-select id="skills_tools" name="skills_tools[]" multiple :error="$errors->has('skills_tools')" placeholder="Select skills..." searchPlaceholder="Search skills...">
                        @foreach($skills as $skill)
                            <option value="{{ $skill->name }}" {{ in_array($skill->name, old('skills_tools', [])) ? 'selected' : '' }}>{{ $skill->name }}</option>
                        @endforeach
                    </x-choices-select>
                    <x-input-error class="mt-2" :messages="$errors->get('skills_tools')" />
                </div>

                <!-- Image -->
                <x-image-upload 
                    name="image" 
                    :label="LabelConstants::IMAGE" 
                    :useCard="false"
                />

                <!-- Demo Link -->
                <div class="mb-4">
                    <x-input-label for="demo_link" :value="LabelConstants::DEMO_LINK" />
                    <x-text-input id="demo_link" name="demo_link" type="url" class="block w-full mt-1" :value="old('demo_link')" placeholder="https://example.com" />
                    <x-input-error class="mt-2" :messages="$errors->get('demo_link')" />
                </div>

                <!-- GitHub Link -->
                <div class="mb-4">
                    <x-input-label for="github_link" :value="LabelConstants::GITHUB_LINK" />
                    <x-text-input id="github_link" name="github_link" type="url" class="block w-full mt-1" :value="old('github_link')" placeholder="https://github.com/username/project" />
                    <x-input-error class="mt-2" :messages="$errors->get('github_link')" />
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <x-input-label for="description" :value="LabelConstants::DESCRIPTION">
                    <span class="text-red-500">*</span>
                </x-input-label>
                <x-textarea id="description" name="description" rows="4" required>{{ old('description') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div class="flex items-center justify-between">
                <x-primary-button>{{ LabelConstants::SAVE }}</x-primary-button>
                <x-secondary-text-link href="{{ route('admin.projects.index') }}">
                    {{ LabelConstants::CANCEL }}
                </x-secondary-text-link>
            </div>
    </x-admin.form-card>
    <x-summernote-scripts />
</x-admin-layout>
