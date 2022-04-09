<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
            'title'            => 'required',
            'job'              => 'required',
            'category_id'             => 'required',
//            'Job2'             => 'required',
            'city'             => 'required',
            'province'         => 'required',
            'Cooperation_type' => 'required',
            'money'            => 'required',
            'HistoryJop'       => 'required',
            'Document'         => 'required',
            'Gender'           => 'required',
            'Soldier'          => 'required',
            'fild_study'       => 'required',
            'TimeDown'         => 'required',
            'TimeUp'           => 'required',
            'comment'          => 'required',
        ];
    }
}
