<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectTypeRequest extends FormRequest
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
                            'project_type' => 'required|max:255|unique:project_types'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'project_type' => 'required|max:255'
                    ];
                }
            default:
                return [];
        }
    }
}
