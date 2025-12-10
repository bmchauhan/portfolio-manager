<x-admin-layout :title="LabelConstants::SKILLS">
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::SKILLS }}</h3>
        <x-primary-link href="{{ route('admin.skills.create') }}">
            {{ LabelConstants::ADD_NEW }}
        </x-primary-link>
    </div>

    <div class="mt-8">
        <x-table>
            <x-table.thead>
                <x-table.th>{{ LabelConstants::NAME }}</x-table.th>
                <x-table.th>{{ LabelConstants::CATEGORY }}</x-table.th>
                <x-table.th>{{ LabelConstants::PROFICIENCY }}</x-table.th>
                <x-table.th></x-table.th>
            </x-table.thead>
            <x-table.tbody>
                @foreach($skills as $skill)
                <x-table.tr>
                    <x-table.td>
                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $skill->name }}</div>
                    </x-table.td>
                    <x-table.td>
                        <div class="text-sm leading-5 text-gray-900">{{ OptionConstants::SKILL_CATEGORIES[$skill->category] ?? $skill->category }}</div>
                    </x-table.td>
                    <x-table.td>
                        <div class="text-sm leading-5 text-gray-900">{{ OptionConstants::PROFICIENCY_LEVELS[$skill->proficiency] ?? $skill->proficiency }}</div>
                    </x-table.td>
                    <x-table.td class="text-right text-sm leading-5 font-medium">
                        <x-secondary-text-link href="{{ route('admin.skills.edit', $skill->id) }}" class="mr-4">
                            {{ LabelConstants::EDIT }}
                        </x-secondary-text-link>
                        
                        <x-admin.delete-button :action="route('admin.skills.destroy', $skill->id)" />
                    </x-table.td>
                </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
        <div class="mt-4">
            {{ $skills->links() }}
        </div>
    </div>
</x-admin-layout>
