<x-admin-layout :title="LabelConstants::ADD_NEW . ' ' . LabelConstants::EDUCATION">
    <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::ADD_NEW }} {{ LabelConstants::EDUCATION }}</h3>

    <div class="mt-8">
        <form action="{{ route('admin.educations.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Institution -->
                <div class="mb-4">
                    <x-input-label for="institution" :value="LabelConstants::INSTITUTION">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="institution" name="institution" :value="old('institution')" required :error="$errors->has('institution')" />
                    <x-input-error :messages="$errors->get('institution')" />
                </div>

                <!-- Degree -->
                <div class="mb-4">
                    <x-input-label for="degree" :value="LabelConstants::DEGREE">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="degree" name="degree" :value="old('degree')" required :error="$errors->has('degree')" />
                    <x-input-error :messages="$errors->get('degree')" />
                </div>

                <!-- Field of Study -->
                <div class="mb-4">
                    <x-input-label for="field_of_study" :value="LabelConstants::FIELD_OF_STUDY" />
                    <x-text-input id="field_of_study" name="field_of_study" :value="old('field_of_study')" :error="$errors->has('field_of_study')" />
                    <x-input-error :messages="$errors->get('field_of_study')" />
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
                    <x-input-label for="is_current" :value="LabelConstants::CURRENTLY_STUDYING" class="ml-2 mb-0 inline-block" />
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
                <x-secondary-text-link href="{{ route('admin.educations.index') }}">
                    {{ LabelConstants::CANCEL }}
                </x-secondary-text-link>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/admin/date-validation.js') }}"></script>
    <x-summernote-scripts />
</x-admin-layout>
