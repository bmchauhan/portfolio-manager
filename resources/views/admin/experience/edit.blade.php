<x-admin-layout :title="LabelConstants::EDIT . ' ' . LabelConstants::EXPERIENCE">
    @php
        $startMonth = $experience->start_date ? $experience->start_date->format('m') : '';
        $startYear = $experience->start_date ? $experience->start_date->format('Y') : '';
        $endMonth = $experience->end_date ? $experience->end_date->format('m') : '';
        $endYear = $experience->end_date ? $experience->end_date->format('Y') : '';
    @endphp

    <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::EDIT }} {{ LabelConstants::EXPERIENCE }}</h3>

    <x-admin.form-card action="{{ route('admin.experiences.update', $experience->id) }}" method="PUT">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Company -->
                <div class="mb-4">
                    <x-input-label for="company" :value="LabelConstants::COMPANY">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="company" name="company" :value="old('company', $experience->company)" required :error="$errors->has('company')" />
                    <x-input-error :messages="$errors->get('company')" />
                </div>

                <!-- Position -->
                <div class="mb-4">
                    <x-input-label for="position" :value="LabelConstants::POSITION">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="position" name="position" :value="old('position', $experience->position)" required :error="$errors->has('position')" />
                    <x-input-error :messages="$errors->get('position')" />
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <x-input-label for="type" :value="LabelConstants::TYPE">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-select id="type" name="type" required :error="$errors->has('type')">
                        @foreach(OptionConstants::EXPERIENCE_TYPES as $value => $label)
                            <option value="{{ $value }}" {{ old('type', $experience->type) == $value ? 'selected' : '' }}>{{ $label }}</option>
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
                            <option value="{{ $value }}" {{ old('location_type', $experience->location_type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('location_type')" />
                </div>

                <!-- Skills -->
                <div class="mb-4">
                    <x-input-label for="skills" :value="LabelConstants::SKILLS" />
                    <x-choices-select id="skills" name="skills[]" multiple :error="$errors->has('skills')" placeholder="Search and select skills..." searchPlaceholder="Search skills...">
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}" data-custom-properties='@json(['icon' => $skill->icon])' {{ in_array($skill->id, old('skills', $experience->skills->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $skill->name }}</option>
                        @endforeach
                    </x-choices-select>
                    <x-input-error :messages="$errors->get('skills')" />
                </div>

                <!-- Start Date -->
                <x-date-select 
                    :label="LabelConstants::START_DATE" 
                    monthName="start_month" 
                    yearName="start_year" 
                    :monthValue="old('start_month', $startMonth)"
                    :yearValue="old('start_year', $startYear)"
                    :required="true" 
                    errorKey="start_date" 
                />

                <!-- End Date -->
                <x-date-select 
                    :label="LabelConstants::END_DATE" 
                    monthName="end_month" 
                    yearName="end_year" 
                    :monthValue="old('end_month', $endMonth)"
                    :yearValue="old('end_year', $endYear)"
                    errorKey="end_date" 
                />

                <!-- Is Current -->
                <div class="mb-4 flex items-center">
                    <x-checkbox id="is_current" name="is_current" :checked="old('is_current', $experience->is_current)" />
                    <x-input-label for="is_current" :value="LabelConstants::CURRENTLY_WORKING" class="ml-2 mb-0 inline-block" />
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <x-input-label for="description" :value="LabelConstants::DESCRIPTION" />
                <x-textarea id="description" name="description" rows="4" :error="$errors->has('description')">{{ old('description', $experience->description) }}</x-textarea>
                <x-input-error :messages="$errors->get('description')" />
            </div>

            <div class="flex items-center justify-between">
                <x-primary-button>
                    {{ LabelConstants::UPDATE }}
                </x-primary-button>
                <x-secondary-text-link href="{{ route('admin.experiences.index') }}">
                    {{ LabelConstants::CANCEL }}
                </x-secondary-text-link>
            </div>
    </x-admin.form-card>
    <script src="{{ asset('js/admin/date-validation.js') }}"></script>
    <x-summernote-scripts />
</x-admin-layout>
