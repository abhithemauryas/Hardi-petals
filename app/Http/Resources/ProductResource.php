<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'               => $this->id,
            'name'           => $this->name,
            'category'    => $this->category,
            'categorySlug'    => strtolower(str_replace(" ",'-',$this->category)),
            'price'          => $this->discount? ($this->price - ($this->discount / 100) * $this->price): $this->price,
            'stock'     => $this->stock,
            'discount'         => $this->discount,
            'filterItems'      => $this->filterItems,
            'productNumber'    => $this->productNumber,
            'imageGallery'     => $this->reform($this->imageGallery),
            'originals'        => $this->decoded($this->imageGallery),
            'thumbs'            => $this->thumb($this->imageGallery),
            'description'      => $this->description,
            'isSale'          => $this->isSale,
            'isNew'          => $this->isNew,
            'image'          => $this->reform($this->imageGallery)[0]??asset('storage/placeholder.png'),
            'isStocked'        => $this->isStocked,
            'ordered'          => $this->ordered,
            'created'          => $this->created_at,
            'updated'          => $this->updated_at,
            'reviews'          => $this->reviews??[],
            'slug'             => strtolower(str_replace(" ","-",$this->name))
        ];
    }

    public function reform($images){
        $updated = [];
        foreach($images as $img) {
            $updated[] = json_decode($img)->original;
        }
        return $updated;
    }

    public function decoded($array){
        $updated =[];
        foreach($array as $string) {
            $updated[] = json_decode($string);
        }
        return $updated;
    }

    public function thumb($arr) {
        $thumbs =[];
        foreach ($arr as $img) {
            $thumbs[] = json_decode($img)->thumbnail;
        }
        return $thumbs;
    }
}
