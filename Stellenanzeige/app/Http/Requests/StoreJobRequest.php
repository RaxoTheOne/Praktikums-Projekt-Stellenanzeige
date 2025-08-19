<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'company_id' => 'nullable|exists:companies,id',
            'company_name' => 'required_without:company_id|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'salary' => 'nullable|integer|min:0',
            'published_at' => 'nullable|date',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'integer|exists:categories,id',
        ];
    }
}
