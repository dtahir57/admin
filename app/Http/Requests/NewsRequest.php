<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                            'title' => 'required|max:255|unique:news',
                            'type' => 'required',
                            'body' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|max:255',
                        'type' => 'required',
                        'body' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
