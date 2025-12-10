@props(['id', 'name', 'multiple' => false, 'placeholder' => 'Select...', 'searchPlaceholder' => 'Search...'])

<div class="relative">
    <select id="{{ $id }}" name="{{ $name }}" {{ $multiple ? 'multiple' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
        {{ $slot }}
    </select>
</div>

@pushonce('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
    <style>
        .choices__list--dropdown .choices__item--selectable {
            padding-right: 10px;
        }
    </style>
@endpushonce

@pushonce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
@endpushonce

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const element = document.getElementById('{{ $id }}');
        const choices = new Choices(element, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: '{{ $placeholder }}',
            searchPlaceholderValue: '{{ $searchPlaceholder }}',
            itemSelectText: '',
            callbackOnCreateTemplates: function(template) {
                return {
                    item: ({ classNames }, data) => {
                        const icon = data.customProperties && data.customProperties.icon 
                            ? `<i class="${data.customProperties.icon} mr-2"></i>` 
                            : '';
                        return template(`
                            <div class="${classNames.item} ${data.highlighted ? classNames.highlightedState : classNames.itemSelectable} ${data.placeholder ? classNames.placeholder : ''}" data-item data-id="${data.id}" data-value="${data.value}" ${data.active ? 'aria-selected="true"' : ''} ${data.disabled ? 'aria-disabled="true"' : ''}>
                                ${icon} ${data.label}
                                <button type="button" class="choices__button" aria-label="Remove item: '${data.label}'" data-button="">Remove item</button>
                            </div>
                        `);
                    },
                    choice: ({ classNames }, data) => {
                        const icon = data.customProperties && data.customProperties.icon 
                            ? `<i class="${data.customProperties.icon} mr-2"></i>` 
                            : '';
                        return template(`
                            <div class="${classNames.item} ${classNames.itemChoice} ${data.disabled ? classNames.itemDisabled : classNames.itemSelectable}" data-select-text="${this.config.itemSelectText}" data-choice ${data.disabled ? 'data-choice-disabled aria-disabled="true"' : 'data-choice-selectable'} data-id="${data.id}" data-value="${data.value}" ${data.groupId > 0 ? 'role="treeitem"' : 'role="option"'}>
                                ${icon} ${data.label}
                            </div>
                        `);
                    },
                };
            }
        });
    });
</script>
