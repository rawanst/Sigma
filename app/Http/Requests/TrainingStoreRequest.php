<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:10',
            'extract' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|double',
            'published_on' => 'nullable',
            'picture' => 'required|image',
            'categories' => 'nullable',
            'types' => 'nullable'
        ];
    }
}
