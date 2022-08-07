<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'=>['required','min:5','max:50','string'],
            'area'=>['required','integer'],
            'category'=>['required','integer'],
            'body'=>['required','min:5','max:255','string'],
            'image'=>['image','mimes:jpeg,png,jpg,gif','max:1024'],
            'can_display_id'=>['boolean']
        ];
    }
}
