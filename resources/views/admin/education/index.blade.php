<x-admin-layout :title="LabelConstants::EDUCATION">
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::EDUCATION }}</h3>
        <x-primary-link href="{{ route('admin.educations.create') }}">
            {{ LabelConstants::ADD_NEW }}
        </x-primary-link>
    </div>

    <div class="mt-8">
        <x-table>
            <x-table.thead>
                <x-table.th>{{ LabelConstants::INSTITUTION }}</x-table.th>
                <x-table.th>{{ LabelConstants::DEGREE }}</x-table.th>
                <x-table.th>{{ LabelConstants::FIELD_OF_STUDY }}</x-table.th>
                <x-table.th>{{ LabelConstants::DURATION }}</x-table.th>
                <x-table.th></x-table.th>
            </x-table.thead>
            <x-table.tbody>
                @foreach($educations as $education)
                <x-table.tr>
                    <x-table.td>
                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $education->institution }}</div>
                    </x-table.td>
                    <x-table.td>
                        <div class="text-sm leading-5 text-gray-900">{{ $education->degree }}</div>
                    </x-table.td>
                    <x-table.td>
                        <div class="text-sm leading-5 text-gray-900">{{ $education->field_of_study }}</div>
                    </x-table.td>
                    <x-table.td class="text-sm leading-5 text-gray-500">
                        {{ $education->start_date->format('M Y') }} - 
                        {{ $education->is_current ? LabelConstants::PRESENT : ($education->end_date ? $education->end_date->format('M Y') : 'N/A') }}
                    </x-table.td>
                    <x-table.td class="text-right text-sm leading-5 font-medium">
                        <x-secondary-text-link href="{{ route('admin.educations.edit', $education->id) }}" class="mr-4">
                            {{ LabelConstants::EDIT }}
                        </x-secondary-text-link>
                        <x-admin.delete-button :action="route('admin.educations.destroy', $education->id)" />
                    </x-table.td>
                </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
        <div class="mt-4">
            {{ $educations->links() }}
        </div>
    </div>
</x-admin-layout>
