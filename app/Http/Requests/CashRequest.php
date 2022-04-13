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
        $rules = [
            'date' => 'required|string',
            'token' => 'required|string',
            'project' => 'string',
            'status' => 'string',
            'pic' => 'string',
            'paidto' => 'string',
            'type' => 'required',
            'transDebit.*.descriptionDebit' => 'required',
            'transDebit.*.referralDebit' => 'required',
            'transDebit.*.debit' => 'required',
            'transCredit.*.descriptionCredit' => 'required',
            'transCredit.*.referralCredit' => 'required',
            'transCredit.*.credit' => 'required',
            'report' => 'mimes:png,jpg,jpeg,pdf,doc,docx',
            'attach.*' => '',
            'arrattachments' => '',
        ];

        if($this->input('arrattachments')){
            $attach = json_decode($this->input('arrattachments'));
            foreach($attach as $atc){
                $ext = pathinfo($atc, PATHINFO_EXTENSION);
                if($ext != "png"){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                elseif($ext != "jpg"){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                elseif($ext != "jpeg"){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                elseif($ext != "doc"){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                elseif($ext != "docx"){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                elseif($ext != "pdf"){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                elseif($ext != ""){
                    $rules['attach.*'] = 'mimes:png,jpg,jpeg,pdf,doc,docx';
                    break;
                }
                $rules['attach.*'] = '';
            }
        }

        return $rules;
    }
}
