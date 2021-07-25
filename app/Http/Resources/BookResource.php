<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = $this->whenLoaded('user');
        return [
            'id' => $this->id,
            'isbn13' => $this->isbn13,
            'user' => new UserResource($user),
        ];
    }
}
