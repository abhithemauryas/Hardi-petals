<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'orderNumber' => $this->orderNumber,
            'address' => $this->address,
            'payment_mode' => $this->payment_mode,
            'total' => number_format($this->total,2),
            'status' => $this->statusText($this->stage),
            'created_at' => $this->created_at,
        ];
    }

    public function statusText($num) {
        $text = [
            0 => "Cancelled",
            1 => "Pending",
            2 => "Confirmed",
            3 => "Packed",
            4 => "Out for delivery",
            5 => "Delivered",
            6 => "Return pending",
            7 => "Refunded",
        ];
        return $text[$num];
    }
}
