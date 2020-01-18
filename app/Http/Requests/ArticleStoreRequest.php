<?php

namespace App\Http\Requests;

use App\Article;
use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name' => 'required|unique:articles',
                    'body' => 'required|min:100',
                ];
            }
            case 'PATCH':
            {
                return [
                    'name' => 'required|unique:articles,name,' . $this->segment(2),
                    'body' => 'required|min:100',
                ];
            }

            default:break;
        }

    }
}
