<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'year' => 'required|integer|min:1950|max:2023',
            'pages' => 'required|integer|min:5|max:1000',
            'letter' => 'required|exists:letters,id',
            'binding' => 'required|exists:bindings,id',
            'format' => 'required|exists:formats,id',
            'language' => 'required|exists:languages,id',
            'publisher' => 'required|exists:publishers,id',
            'category' => 'required|exists:categories,id',
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id'
        ];
    }
}
