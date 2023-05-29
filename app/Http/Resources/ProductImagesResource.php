<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'      =>  $this->id,
            'product_id'      =>  $this->product_id,
            'images' => ImagesResource::collection($this->getMedia('images')),
            'title'   => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
        ];
    }
}
