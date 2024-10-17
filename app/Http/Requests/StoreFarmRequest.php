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
            'name'=>'required|string|max:255',
            'location'=>'required|string|max:255',
            'size'=>'required|string|max:255',
            'ownership'=>'required',
            'land_type'=>'required|string|max:255',
            'water_sources'=>'required|string|max:255',
            'farming_practices'=>'required|string|max:255',
            'employees'=>'required|string|max:255',
            'establishment_date'=>'required|string|max:255',
        ];
    }
}
