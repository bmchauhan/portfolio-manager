<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills_tools' => 'nullable|array',
            'skills_tools.*' => 'string',
            'type' => 'required|in:personal,client,company',
            'demo_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048', // 2MB Max
        ];
    }
}
