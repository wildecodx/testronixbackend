<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
  /**
   * Transform the resource collection into an array.
   *
   * @return array<int|string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'reservationId' => $this->reservation_id,
      'firstName' => $this->first_name,
      'lastName' => $this->last_name,
      'email' => $this->email,
      'rentalTime' => $this->rental_time,
      'venue' => $this->venue,
      'notes' => $this->notes
    ];
  }
}
