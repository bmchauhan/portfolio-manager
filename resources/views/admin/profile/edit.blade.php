<x-admin-layout :title="LabelConstants::EDIT . ' ' . LabelConstants::PROFILE">
    <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::EDIT }} {{ LabelConstants::PROFILE }}</h3>

    <div class="mt-8">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div class="mb-4">
                    <x-input-label for="full_name" :value="LabelConstants::FULL_NAME">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="full_name" name="full_name" :value="old('full_name', $personalDetail->full_name ?? '')" required :error="$errors->has('full_name')" />
                    <x-input-error :messages="$errors->get('full_name')" />
                </div>

                <!-- Headline -->
                <div class="mb-4">
                    <x-input-label for="headline" :value="LabelConstants::HEADLINE" />
                    <x-text-input id="headline" name="headline" :value="old('headline', $personalDetail->headline ?? '')" placeholder="e.g. Full Stack Developer" :error="$errors->has('headline')" />
                    <x-input-error :messages="$errors->get('headline')" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="LabelConstants::EMAIL" />
                    <x-text-input id="email" type="email" name="email" :value="old('email', $personalDetail->email ?? '')" :error="$errors->has('email')" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <x-input-label for="phone" :value="LabelConstants::PHONE" />
                    <x-text-input id="phone" name="phone" :value="old('phone', $personalDetail->phone ?? '')" :error="$errors->has('phone')" />
                    <x-input-error :messages="$errors->get('phone')" />
                </div>

                <!-- LinkedIn URL -->
                <div class="mb-4">
                    <x-input-label for="linkedin_url" :value="LabelConstants::LINKEDIN_URL" />
                    <x-text-input id="linkedin_url" type="url" name="linkedin_url" :value="old('linkedin_url', $personalDetail->linkedin_url ?? '')" :error="$errors->has('linkedin_url')" />
                    <x-input-error :messages="$errors->get('linkedin_url')" />
                </div>

                <!-- GitHub URL -->
                <div class="mb-4">
                    <x-input-label for="github_url" value="GitHub URL" />
                    <x-text-input id="github_url" type="url" name="github_url" :value="old('github_url', $personalDetail->github_url ?? '')" :error="$errors->has('github_url')" />
                    <x-input-error :messages="$errors->get('github_url')" />
                </div>
            </div>

            <!-- Address -->
            <div class="mb-4">
                <x-input-label for="address" value="Address" />
                <x-text-input id="address" name="address" :value="old('address', $personalDetail->address ?? '')" :error="$errors->has('address')" />
                <x-input-error :messages="$errors->get('address')" />
            </div>

            <!-- Bio -->
            <div class="mb-6">
                <x-input-label for="bio" :value="LabelConstants::BIO" />
                <x-textarea id="bio" name="bio" rows="4" :error="$errors->has('bio')">{{ old('bio', $personalDetail->bio ?? '') }}</x-textarea>
                <x-input-error :messages="$errors->get('bio')" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Resume Upload -->
                <x-admin.file-upload 
                    :label="LabelConstants::RESUME . ' (PDF)'" 
                    name="resume" 
                    accept=".pdf" 
                    :error="$errors->get('resume')" 
                    :file="$personalDetail->resume ?? null" 
                    :deleteRoute="route('admin.profile.resume.delete')"
                />

                <!-- Avatar Upload -->
                <x-admin.file-upload 
                    :label="LabelConstants::AVATAR" 
                    name="avatar" 
                    accept="image/*" 
                    :error="$errors->get('avatar')" 
                    :file="$personalDetail->avatar ?? null" 
                    :deleteRoute="route('admin.profile.avatar.delete')"
                    :isImage="true"
                />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button>
                    {{ LabelConstants::SAVE }} {{ LabelConstants::PROFILE }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>
