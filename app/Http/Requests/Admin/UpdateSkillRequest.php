<?php

namespace App\Http\Requests\Admin;

use App\Constants\OptionConstants;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSkillRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category' => ['required', Rule::in(array_keys(OptionConstants::SKILL_CATEGORIES))],
            'proficiency' => ['nullable', Rule::in(array_keys(OptionConstants::PROFICIENCY_LEVELS))],
            'icon' => 'nullable|string|max:255',
        ];
    }
}