<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePinnedArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Add logic for user type, user logged in etc.
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
            'id' => 'required|unique:App\Models\PinnedArticle,article_id',
            'webPublicationDate' => 'required',
            'articleTitle' => 'required',
            'webUrl' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'id.unique' => 'Article is already pinned!',
            // Add more custom messages for other rules if needed
        ];
    }
}
