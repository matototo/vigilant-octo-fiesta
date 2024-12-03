<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'title' => isset($this->title[app()->getLocale()]) ? $this->title[app()->getLocale()] : $this->title['en'],
        'description' => isset($this->description[app()->getLocale()]) ? $this->description[app()->getLocale()] : $this->description['en']
    ];
}
}
