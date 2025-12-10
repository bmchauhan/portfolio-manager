@props(['label', 'monthName', 'yearName', 'monthValue' => '', 'yearValue' => '', 'required' => false, 'errorKey' => null])
@php
    $years = range(date('Y'), OptionConstants::START_YEAR);
    $hasError = $errorKey && $errors->has($errorKey);
@endphp

<div class="mb-4">
    <x-input-label :value="$label">
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </x-input-label>
    <div class="flex gap-4">
        <x-select name="{{ $monthName }}" id="{{ $monthName }}" class="flex-1" :required="$required" :error="$hasError">
            <option value="">{{ LabelConstants::MONTH }}</option>
            @foreach(OptionConstants::MONTHS as $key => $val)
                <option value="{{ $key }}" {{ (string)$monthValue === (string)$key ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </x-select>
        <x-select name="{{ $yearName }}" id="{{ $yearName }}" class="flex-1" :required="$required" :error="$hasError">
            <option value="">{{ LabelConstants::YEAR }}</option>
            @foreach($years as $year)
                <option value="{{ $year }}" {{ (string)$yearValue === (string)$year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </x-select>
    </div>
    @if($errorKey)
        <x-input-error :messages="$errors->get($errorKey)" />
    @endif
</div>
