<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUnitRequest extends FormRequest
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
                            'project_name' => 'required|max:255',
                            'city' => 'required|max:255',
                            'type' => 'required|max:255',
                            'name' => 'required|max:255|unique:project_units',
                            'rate_card' => 'required|max:255',
                            'cost' => 'required',
                            'down_payment' => 'required',
                            'installment' => 'required',
                            'year_of_installment' => 'required',
                            'area' => 'required',
                            'installment_monthly' => 'required|max:255',
                            'installment_quarter' => 'required|max:255',
                            'half_year' => 'required',
                            'installment_annually' => 'required',
                            'offer_discount' => 'required',
                            'description' => 'required'
                        ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'project_name' => 'required|max:255',
                        'city' => 'required|max:255',
                        'type' => 'required|max:255',
                        'name' => 'required|max:255',
                        'rate_card' => 'required|max:255',
                        'cost' => 'required',
                        'down_payment' => 'required',
                        'installment' => 'required',
                        'year_of_installment' => 'required',
                        'area' => 'required',
                        'installment_monthly' => 'required|max:255',
                        'installment_quarter' => 'required|max:255',
                        'half_year' => 'required',
                        'installment_annually' => 'required',
                        'offer_discount' => 'required',
                        'description' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}
