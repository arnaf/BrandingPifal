<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $path = base_path('public/photo');
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'desc' => $this->desc,
            'image' => $this->image,
            'barcode' => $this->barcode,
            'sellPrice' => $this->sellPrice,
            'quantity' => $this->quantity,

            'created_at' => $this->created_at,

            'image_url' => ( url('/photos/drugs').'/'.$this->image )


        ];
    }
}
