<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'title' => 'string|max:255|min:1',
            'body' => 'required|string|max:255|min:1',
            'parent_id' => 'nullable|integer|exists:posts,id',
            'user_id' => 'integer|exists:users,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::user()->id
        ]);
    }
}
