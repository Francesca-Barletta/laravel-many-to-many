<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'progetto' => 'required|string',
           
            'descrizione' => 'required|max:2000',
            'link' =>'required|string',
            'image'=>'nullable|string',
            'type_id'=> 'nullable|exists:types,id',
            'technologies'=>'exists:technologies,id'
        ];
    }
}
