<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'   => ['required','string','min:3','max:150'],
            'slug'    => ['nullable','string','max:180','unique:articles,slug'],
            'excerpt' => ['nullable','string','max:255'],
            'content' => ['nullable','string'],
        ];
    }

    

    
}