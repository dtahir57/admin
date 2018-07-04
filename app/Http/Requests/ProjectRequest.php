<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                            'company_name' => 'required|max:255',
                            'name' => 'required|max:255|unique:projects',
                            'description' => 'required',
                            'lat' => 'required',
                            'lng' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'company_name' => 'required|max:255',
                        'name' => 'required|max:255',
                        'description' => 'required',
                        'lat' => 'required',
                        'lng' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
