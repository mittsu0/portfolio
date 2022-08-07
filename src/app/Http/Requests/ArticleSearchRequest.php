<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->path() === '/' ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'area' => ['nullable','integer'],
            'category' => ['nullable', 'integer'],
            'keyword' => ['nullable','max:50','string'],
            'popularity' => ['boolean']
        ];
    }
    protected $redirectRoute = 'articles.index';
}
