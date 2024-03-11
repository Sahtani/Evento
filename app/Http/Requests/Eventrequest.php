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
                'image' => 'required',
                'title' => 'required|string|max:255',
                'date' => 'required|date|after:today',
                'location' => 'required|string|max:255',
                'nbr' => 'required|numeric|min:1',
                'price' => 'required|numeric|min:1',
                'description' => 'required|string',
                'category_id' => 'required  ',
                'mode' => 'required',
            ];
    }
}
