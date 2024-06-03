<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamHistoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (is_null($this->input('name')) && is_null($this->input('user_id'))) {
                $validator->errors()->add('name', 'Either name or user_id must be provided.');
                $validator->errors()->add('user_id', 'Either name or user_id must be provided.');
            }
        });
    }
}
