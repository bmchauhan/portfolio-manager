@props(['model'])

@if($model->hasPages())
    <div {{ $attributes->merge(['class' => 'mt-4 px-6 pb-4']) }}>
        {{ $model->links() }}
    </div>
@endif