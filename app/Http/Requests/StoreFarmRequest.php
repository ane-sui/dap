<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFarmRequest extends FormRequest
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
        // dd($request);

        return [
           'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'size' => 'required|numeric',
            'water_sources' => 'nullable|string',
            'land_type' => 'nullable|string',
            'farming_practices' => 'nullable|string',
            'establishment_date' => 'required|date',
            'ownership' => 'nullable|string',
            'employees' => 'nullable|integer',
        ];
    }
}
