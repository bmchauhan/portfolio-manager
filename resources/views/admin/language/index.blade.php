<x-admin-layout :title="LabelConstants::LANGUAGES">
    <div x-data="{
        editingLanguage: { id: null, name: '', proficiency: '' },
        openEditModal(language) {
            this.editingLanguage = language;
            $dispatch('open-modal', 'edit-language');
        }
    }"
    x-init="
        @if($errors->any())
            @if(old('_method') === 'PUT')
                editingLanguage = {
                    id: '{{ old('id') }}',
                    name: @js(old('name')),
                    proficiency: '{{ old('proficiency') }}'
                };
                $dispatch('open-modal', 'edit-language');
            @else
                $dispatch('open-modal', 'create-language');
            @endif
        @endif
    ">
        <div class="flex justify-between items-center">
            <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::LANGUAGES }}</h3>
            <x-primary-button @click="$dispatch('open-modal', 'create-language')" type="button">
                {{ LabelConstants::ADD_NEW }}
            </x-primary-button>
        </div>

        <x-admin.table-card>
            <x-table :hasShadow="false">
                <x-table.thead>
                    <x-table.th>{{ LabelConstants::NAME }}</x-table.th>
                    <x-table.th>{{ LabelConstants::PROFICIENCY }}</x-table.th>
                    <x-table.th></x-table.th>
                </x-table.thead>
                <x-table.tbody>
                    @foreach($languages as $language)
                    <x-table.tr>
                        <x-table.td>
                            <div class="text-sm leading-5 font-medium text-gray-900">{{ $language->name }}</div>
                        </x-table.td>
                        <x-table.td>
                            <div class="text-sm leading-5 text-gray-900">{{ OptionConstants::PROFICIENCY_LEVELS[$language->proficiency] ?? $language->proficiency }}</div>
                        </x-table.td>
                        <x-table.td class="text-right text-sm leading-5 font-medium">
                            <button @click="openEditModal({{ $language }})" class="btn-link-secondary mr-4">
                                {{ LabelConstants::EDIT }}
                            </button>
                            
                            <x-admin.delete-button :action="route('admin.languages.destroy', $language->id)" />
                        </x-table.td>
                    </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>
            <x-admin.pagination :model="$languages" />
        </x-admin.table-card>

        <!-- Create Modal -->
        <x-modal name="create-language" :title="LabelConstants::ADD_NEW . ' ' . LabelConstants::LANGUAGE">
            <form action="{{ route('admin.languages.store') }}" method="POST">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="create_name" :value="LabelConstants::NAME">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="create_name" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Proficiency -->
                <div class="mb-4">
                    <x-input-label for="create_proficiency" :value="LabelConstants::PROFICIENCY" />
                    <div class="relative">
                        <x-select id="create_proficiency" name="proficiency">
                            <option value="">Select Proficiency</option>
                            @foreach(OptionConstants::PROFICIENCY_LEVELS as $value => $label)
                                <option value="{{ $value }}" {{ old('proficiency') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </x-select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('proficiency')" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-secondary-button @click="show = false" type="button" class="mr-2">
                        {{ LabelConstants::CANCEL }}
                    </x-secondary-button>
                    <x-primary-button>
                        {{ LabelConstants::SAVE }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>

        <!-- Edit Modal -->
        <x-modal name="edit-language" :title="LabelConstants::EDIT . ' ' . LabelConstants::LANGUAGE">
            <form :action="'{{ route('admin.languages.index') }}/' + editingLanguage.id" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" x-model="editingLanguage.id">
                
                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="edit_name" :value="LabelConstants::NAME">
                        <span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="edit_name" name="name" x-model="editingLanguage.name" required />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Proficiency -->
                <div class="mb-4">
                    <x-input-label for="edit_proficiency" :value="LabelConstants::PROFICIENCY" />
                    <div class="relative">
                        <x-select id="edit_proficiency" name="proficiency" x-model="editingLanguage.proficiency">
                            <option value="">Select Proficiency</option>
                            @foreach(OptionConstants::PROFICIENCY_LEVELS as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('proficiency')" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-secondary-button @click="show = false" type="button" class="mr-2">
                        {{ LabelConstants::CANCEL }}
                    </x-secondary-button>
                    <x-primary-button>
                        {{ LabelConstants::UPDATE }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-admin-layout>
