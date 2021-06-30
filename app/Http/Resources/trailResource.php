<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class trailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'trail_to' => $this->trail_to,
            'flying_from' => $this->flying_from,
            'total_cost' => $this->total_cost,
            'created_at' => $this->created_at,
            'trails'=>$this->getTrailsItems
        ];
    }
}
