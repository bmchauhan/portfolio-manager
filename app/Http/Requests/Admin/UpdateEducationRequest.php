<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ];
    }
}
