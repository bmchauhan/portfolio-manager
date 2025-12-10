<x-admin-layout :title="LabelConstants::EXPERIENCE">
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::EXPERIENCE }}</h3>
        <x-primary-link href="{{ route('admin.experiences.create') }}">
            {{ LabelConstants::ADD_NEW }}
        </x-primary-link>
    </div>

    <div class="mt-8">
        <x-table>
            <x-table.thead>
                <x-table.th>{{ LabelConstants::COMPANY }}</x-table.th>
                <x-table.th>{{ LabelConstants::POSITION }}</x-table.th>
                <x-table.th>{{ LabelConstants::TYPE }}</x-table.th>
                <x-table.th>{{ LabelConstants::LOCATION }}</x-table.th>
                <x-table.th>{{ LabelConstants::SKILLS }}</x-table.th>
                <x-table.th>{{ LabelConstants::DURATION }}</x-table.th>
                <x-table.th></x-table.th>
            </x-table.thead>
            <x-table.tbody>
                @foreach($experiences as $experience)
                <x-table.tr>
                    <x-table.td>
                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $experience->company }}</div>
                    </x-table.td>
                    <x-table.td>
                        <div class="text-sm leading-5 text-gray-900">{{ $experience->position }}</div>
                    </x-table.td>
                    <x-table.td>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ OptionConstants::EXPERIENCE_TYPES[$experience->type] ?? ucfirst(str_replace('_', ' ', $experience->type)) }}
                        </span>
                    </x-table.td>
                    <x-table.td>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $experience->location_type == 'remote' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ OptionConstants::LOCATION_TYPES[$experience->location_type] ?? ucfirst(str_replace('_', ' ', $experience->location_type)) }}
                        </span>
                    </x-table.td>
                    <x-table.td>
                        <div class="flex flex-wrap gap-1">
                            @foreach($experience->skills as $skill)
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    </x-table.td>
                    <x-table.td class="text-sm leading-5 text-gray-500">
                        {{ $experience->start_date->format('M Y') }} - 
                        {{ $experience->is_current ? LabelConstants::PRESENT : ($experience->end_date ? $experience->end_date->format('M Y') : 'N/A') }}
                    </x-table.td>
                    <x-table.td class="text-right text-sm leading-5 font-medium">
                        <x-secondary-text-link href="{{ route('admin.experiences.edit', $experience->id) }}" class="mr-4">
                            {{ LabelConstants::EDIT }}
                        </x-secondary-text-link>
                        <x-admin.delete-button :action="route('admin.experiences.destroy', $experience->id)" />
                    </x-table.td>
                </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
        <div class="mt-4">
            {{ $experiences->links() }}
        </div>
    </div>
</x-admin-layout>
