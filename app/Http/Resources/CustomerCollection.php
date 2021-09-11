<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item, $key) {
            return [
                'id'        => $item->id,
                'full_name' => $item->first_name . ' ' . $item->last_name,
                'email'     => $item->email,
                'country'   => $item->country
            ];
        })->all();
    }
}
