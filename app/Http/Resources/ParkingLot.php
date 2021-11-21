<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParkingLot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $rate = 0;
        $rating = 0;
        foreach ($this->rating as $i => $key) {
            $rate += $key->rate;
        }
        if ($rate > 0) $rating = $rate / count($this->rating);

        return [
            'park_id' => $this->park_id,
            'name' => $this->name,
            'location' => $this->location,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'car_price' => $this->car_price,
            'bike_price' => $this->bike_price,
            'car_slot' => $this->car_slot,
            'bike_slot' => $this->bike_slot,
            'operational' => $this->operational,
            'status' => $this->status,
            'facilities' => $this->facilities,
            'rating' => $rating
        ];
    }
}
