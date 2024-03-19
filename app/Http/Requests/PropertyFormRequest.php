<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
     * @return array<st, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|st>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string',  'min:4'],
            'description' => ['string'],
            'address' => ['required',  'string',  'min:10', 'max:50'],
            'city'  => ['required',  'string', 'min:4'],
            'country' => [],
            'price' => ['required'],
            'bedrooms' => ['required'],
            'bathrooms' => ['required'],
            'size' => ['required'],
            'sold' => ['boolean'],
            'options' => ['array', 'exists:options,id'],
        ];
    }


    //prepare for validation methode
    protected function prepareForValidation()
    {
        $this->merge(
            [
                'country' => $this->country ?: 'Maroc',
                'sold' => $this->sold == 0 ? false : true,
            ],
        );
    }
}
