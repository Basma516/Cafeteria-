<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'skills' => 'required|array|min:1', // Ensure at least one skill is selected
            'skills.*' => 'string', // Each skill should be a string
            'resume' => '|max:1000', // Adjust validation as needed
            'experience' => '|max:1000', // Adjust validation as needed
            'education' => '|max:1000', // Adjust validation as needed
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'skills.required' => 'At least one skill must be selected.',
            'skills.array' => 'Skills must be an array of strings.',
            'skills.min' => 'Please select at least one skill.',
            'resume.required' => 'The resume is required.',
            'resume.string' => 'The resume must be a valid text.',
            'resume.max' => 'The resume may not be greater than 1000 characters.',
        ];
    }
}