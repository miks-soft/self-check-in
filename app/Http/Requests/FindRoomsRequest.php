<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindRoomsRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dateIn' => 'required|date_format:'.config('api.datetime.format'),
            'dateOut' => 'required|date_format:'.config('api.datetime.format').'|after:dateIn',
        ];
    }
}
