<?php

namespace App\Http\Requests\Admin;

use App\Constants\OptionConstants;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        if ($this->has(['start_month', 'start_year'])) {
            $this->merge([
                'start_date' => $this->start_year . '-' . $this->start_month . '-01',
            ]);
        }

        if ($this->has(['end_month', 'end_year']) && !$this->has('is_current')) {
             $this->merge([
                'end_date' => $this->end_year . '-' . $this->end_month . '-01',
            ]);
        } elseif ($this->has('is_current')) {
            $this->merge([
                'end_date' => null,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'type' => ['required', Rule::in(array_keys(OptionConstants::EXPERIENCE_TYPES))],
            'location_type' => ['required', Rule::in(array_keys(OptionConstants::LOCATION_TYPES))],
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ];
    }
}
