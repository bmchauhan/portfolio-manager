<x-admin-layout :title="LabelConstants::ADD_NEW . ' ' . LabelConstants::EXPERIENCE">
    <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::ADD_NEW }} {{ LabelConstants::EXPERIENCE }}</h3>

    <div class="mt-8">
        <form action="{{ route('admin.experiences.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Company -->
                <div class="mb-4">
                    <x-input-label for="company" :value="LabelConstants::COMPANY">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="company" name="company" :value="old('company')" required :error="$errors->has('company')" />
                    <x-input-error :messages="$errors->get('company')" />
                </div>

                <!-- Position -->
                <div class="mb-4">
                    <x-input-label for="position" :value="LabelConstants::POSITION">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="position" name="position" :value="old('position')" required :error="$errors->has('position')" />
                    <x-input-error :messages="$errors->get('position')" />
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <x-input-label for="type" :value="LabelConstants::TYPE">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-select id="type" name="type" required :error="$errors->has('type')">
                        @foreach(OptionConstants::EXPERIENCE_TYPES as $value => $label)
                            <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('type')" />
                </div>

                <!-- Location Type -->
                <div class="mb-4">
                    <x-input-label for="location_type" :value="LabelConstants::LOCATION_TYPE">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-select id="location_type" name="location_type" required :error="$errors->has('location_type')">
                        @foreach(OptionConstants::LOCATION_TYPES as $value => $label)
                            <option value="{{ $value }}" {{ old('location_type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('location_type')" />
                </div>

                <!-- Skills -->
                <div class="mb-4">
                    <x-input-label for="skills" :value="LabelConstants::SKILLS" />
                    <x-choices-select id="skills" name="skills[]" multiple :error="$errors->has('skills')" placeholder="Search and select skills..." searchPlaceholder="Search skills...">
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}" data-custom-properties='@json(['icon' => $skill->icon])' {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }}>{{ $skill->name }}</option>
                        @endforeach
                    </x-choices-select>
                    <x-input-error :messages="$errors->get('skills')" />
                </div>

                <!-- Start Date -->
                <x-date-select 
                    :label="LabelConstants::START_DATE" 
                    monthName="start_month" 
                    yearName="start_year" 
                    :monthValue="old('start_month')"
                    :yearValue="old('start_year')"
                    :required="true" 
                    errorKey="start_date" 
                />

                <!-- End Date -->
                <x-date-select 
                    :label="LabelConstants::END_DATE" 
                    monthName="end_month" 
                    yearName="end_year" 
                    :monthValue="old('end_month')"
                    :yearValue="old('end_year')"
                    errorKey="end_date" 
                />

                <!-- Is Current -->
                <div class="mb-4 flex items-center">
                    <x-checkbox id="is_current" name="is_current" :checked="old('is_current')" />
                    <x-input-label for="is_current" :value="LabelConstants::CURRENTLY_WORKING" class="ml-2 mb-0 inline-block" />
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <x-input-label for="description" :value="LabelConstants::DESCRIPTION" />
                <x-textarea id="description" name="description" rows="4" :error="$errors->has('description')">{{ old('description') }}</x-textarea>
                <x-input-error :messages="$errors->get('description')" />
            </div>

            <div class="flex items-center justify-between">
                <x-primary-button>
                    {{ LabelConstants::SAVE }}
                </x-primary-button>
                <x-secondary-text-link href="{{ route('admin.experiences.index') }}">
                    {{ LabelConstants::CANCEL }}
                </x-secondary-text-link>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/admin/date-validation.js') }}"></script>
    <x-summernote-scripts />
</x-admin-layout>
