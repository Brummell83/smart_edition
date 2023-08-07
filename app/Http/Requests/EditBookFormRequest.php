<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBookFormRequest extends FormRequest
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
            'name'=>['required'],
            'description'=>['required'],
            'genre'=>['required'],
            'nombre_page'=>['required'],
            'date_pub'=>['required'],
            'image'=>['image','max:2000'],
            'category_id'=>['required','exists:categories,id'],
            'author_id'=>['required','exists:authors,id'],
            'genre'=>['required','array','exists:genres,id'],
            'image_one'=>['image','max:2000'],
            'image_two'=>['image','max:2000'],
            'image_three'=>['image','max:2000'],
            'image_four'=>['image','max:2000'],
        ];
    }
}
