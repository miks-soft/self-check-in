<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintStatusRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'commandId' => 'required',
        ];
    }
}
