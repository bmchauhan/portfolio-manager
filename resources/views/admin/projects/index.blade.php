<x-admin-layout :title="LabelConstants::PROJECTS">
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">{{ LabelConstants::PROJECTS }}</h3>
        <x-primary-link href="{{ route('admin.projects.create') }}">
            {{ LabelConstants::ADD_NEW }}
        </x-primary-link>
    </div>

    <x-admin.table-card>
        <x-table :hasShadow="false">
            <x-table.thead>
                <x-table.th>{{ LabelConstants::IMAGE }}</x-table.th>
                <x-table.th>{{ LabelConstants::PROJECT }}</x-table.th>
                <x-table.th>{{ LabelConstants::TYPE }}</x-table.th>
                <x-table.th>{{ LabelConstants::SKILLS_TOOLS }}</x-table.th>
                <x-table.th>{{ LabelConstants::LINKS }}</x-table.th>
                <x-table.th></x-table.th>
            </x-table.thead>
            <x-table.tbody>
                @foreach($projects as $project)
                <x-table.tr>
                    <x-table.td>
                        @if($project->attachment)
                            <img src="{{ $project->attachment->url }}" alt="{{ $project->title }}" class="w-16 h-16 object-cover rounded">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-gray-500 text-xs">No Image</div>
                        @endif
                    </x-table.td>
                    <x-table.td>
                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $project->title }}</div>
                    </x-table.td>
                    <x-table.td>
                        @if($project->type === 'personal')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ LabelConstants::PERSONAL }}</span>
                        @elseif($project->type === 'client')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ LabelConstants::CLIENT }}</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">{{ LabelConstants::COMPANY }}</span>
                        @endif
                    </x-table.td>
                    <x-table.td>
                        @if($project->skills_tools)
                            <x-tooltip-list :items="$project->skills_tools" :limit="5" />
                        @endif
                    </x-table.td>
                    <x-table.td>
                        <div class="flex flex-col gap-1">
                            @if($project->demo_link)
                                <a href="{{ $project->demo_link }}" target="_blank" class="text-xs text-indigo-600 hover:text-indigo-900">{{ LabelConstants::DEMO_LINK }}</a>
                            @endif
                            @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" class="text-xs text-gray-600 hover:text-gray-900">{{ LabelConstants::GITHUB_LINK }}</a>
                            @endif
                        </div>
                    </x-table.td>
                    <x-table.td class="text-right text-sm leading-5 font-medium">
                        <x-secondary-text-link href="{{ route('admin.projects.edit', $project) }}" class="mr-4">
                            {{ LabelConstants::EDIT }}
                        </x-secondary-text-link>
                        <x-admin.delete-button :action="route('admin.projects.destroy', $project)" />
                    </x-table.td>
                </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
        <x-admin.pagination :model="$projects" />
    </x-admin.table-card>
</x-admin-layout>