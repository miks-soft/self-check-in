<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'paysystem'             => 'required|exists:App\Models\Paysystem,id',
            'rooms'                 => 'required|array|min:1',
            'rooms.*.id'            => 'required|exists:App\Models\Room,id',
            'rooms.*.dateIn'        => 'required|date_format:'.config('api.datetime.format'),
            'rooms.*.dateOut'       => 'required|date_format:'.config('api.datetime.format').'|after:rooms.*.dateIn',
            'rooms.*.count'         => 'required|min:1',
            'contact'               => 'required|array',
            'contact.name'          => 'required|string|min:1',
            'contact.last_name'     => 'required|string|min:1',
            'contact.phone'         => 'required|string|min:1',
            'contact.email'         => 'required|email',
            'contact.date_of_birth' => 'required|date_format:'.config('api.date.format'),
        ];
    }
}
