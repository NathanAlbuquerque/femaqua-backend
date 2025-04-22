<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreToolRequest extends FormRequest
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
            'link' => 'required|url|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array<string, string>
    */
    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser um texto.',
            'title.max' => 'O título não pode ter mais de :max caracteres.',

            'link.required' => 'O link é obrigatório.',
            'link.url' => 'O link deve ser uma URL válida.',
            'link.max' => 'O link não pode ter mais de :max caracteres.',

            'description.required' => 'A descrição é obrigatória.',
            'description.string' => 'A descrição deve ser um texto.',

            'tags.array' => 'As tags devem estar em formato de lista.',
            'tags.*.string' => 'Cada tag deve ser um texto.',
            'tags.*.max' => 'Cada tag pode ter no máximo :max caracteres.',
        ];
    }

    /**
    * Get custom attributes for validator errors.
    *
    * @return array<string, string>
    */
    public function attributes(): array
    {
        return [
            'title' => 'título',
            'link' => 'link',
            'description' => 'descrição',
            'tags' => 'tags',
            'tags.*' => 'tag',
        ];
    }
}
