<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreDoctorRequest extends FormRequest
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
        return RuleFactory::make([
            'name:ar' => 'required|string|max:255',
            'name:en' => 'required|string|max:255',

            'email' => 'required|email|unique:doctors',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15',
            'section_id' => 'required|exists:sections,id',
            // 'appointments' => 'required',

            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }
}
