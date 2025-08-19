<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'company_id' => 'sometimes|nullable|exists:companies,id',
            'company_name' => 'sometimes|required_without:company_id|string|max:255',
            'location' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|required|string',
            'type' => 'sometimes|required|in:full-time,part-time,contract,internship',
            'salary' => 'sometimes|nullable|integer|min:0',
            'published_at' => 'sometimes|nullable|date',
            'category_ids' => 'sometimes|array',
            'category_ids.*' => 'integer|exists:categories,id',
        ];
    }
}
