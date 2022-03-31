<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashRequest extends FormRequest
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
            'date' => 'required|string',
            'token' => 'required|string',
            'project' => 'required|string',
            'pic' => 'required|string',
            'type' => 'required|string',
            'transDebit.descriptionDebit' => 'required|string',
            'transDebit.referralDebit' => 'required|string',
            'transDebit.debit' => 'required|string',
            'transCredit.descriptionCredit' => 'required|string',
            'transCredit.referralCredit' => 'required|string',
            'transCredit.credit' => 'required|string',
            'attach' => 'mimes:png,jpg,jpeg,pdf,doc,docx',
            'report' => 'mimes:png,jpg,jpeg,pdf,doc,docx',
        ];
    }
}
