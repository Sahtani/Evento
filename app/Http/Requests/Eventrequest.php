<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Eventrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            return [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
                'nombre_place' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string',
            ];
    }
}
