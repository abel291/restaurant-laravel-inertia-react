<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'portion_size' => $this->portion_size,
            'calories' => $this->calories,
            'allergies' => $this->allergies,
            'slug' => $this->slug,
            'description_min' => $this->description_min,
            'description_max' => $this->description_max,
            'img' => $this->img,
            'banner' => $this->banner,
            'stars' => $this->stars,
            'price_default' => $this->price_default,
            'max_quantity' => $this->max_quantity,
            'offer' => $this->offer,
            'price' => $this->price,
            'stock' => $this->stock,
            'images' => $this->whenLoaded('images'),
            //'type' => $this->type,
            //'active' => $this->active,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            //shopping_cart
            'quantity' => $this->whenPivotLoaded('shopping_cart', function () {
                return $this->pivot->quantity;
            }),

            'total_price_quantity' => $this->whenPivotLoaded('shopping_cart', function () {
                return $this->pivot->total_price_quantity;
            }),
        ];
    }
}
