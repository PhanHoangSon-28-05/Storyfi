<?php

namespace App\Http\Requests\Story;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStotryRequest extends FormRequest
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
            'name' => 'required',
            'summary' => 'required|max:8000',
            'title_id' => 'required',
        ];
    }
}
