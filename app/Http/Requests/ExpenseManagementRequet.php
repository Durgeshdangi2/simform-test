<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ExpenseManagementRequet extends FormRequest
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
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'date_to' => 'required|date|date_format:Y-m-d|before_or_equal:'.Carbon::now()->toDateString(),
            'type' => 'required|in:Expense,Income'
        ];
    }

    public function attributes()
    {
        return [
            'date_to' => 'Date'
        ];
    }

    public function messages()
    {
        return[
            'amount.regex' => 'please enter valid number and after decimal add only 2 digit.'
        ];
    }
}
