<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                            'name' => 'required|max:255|unique:companies',
                            'company_type' => 'required',
                            'email' => 'required|max:255|unique:companies',
                            'tel' => 'required|max:255',
                            'logo' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|max:255',
                        'company_type' => 'required',
                        'email' => 'required|max:255',
                        'tel' => 'required|max:255'
                    ];
                }
            default:
                return [];
        }
    }
}
