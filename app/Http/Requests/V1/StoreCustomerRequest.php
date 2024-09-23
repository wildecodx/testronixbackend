<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;



class storeCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reservation_id' => 'required|string|unique:customers,reservation_id', //
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email:rfc,nfc',
            'rental_time' => 'nullable|date_format:Y-m-d H:i',
            'venue' => 'required|string',
            'notes' => 'required|string|max:200'
        ];
    }

    public function generateUniqueReservationId()
    {
        do {
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $reservationId = 'RV100' . $randomNumber;
        } while (DB::table('customers')->where('reservation_id', $reservationId)->exists());

        return $reservationId;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'reservation_id' => $this->generateUniqueReservationId(),
        ]);
    }
}
