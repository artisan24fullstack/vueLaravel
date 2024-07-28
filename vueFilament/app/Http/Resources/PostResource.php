<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            //'thumbnail' => $this->thumbnail
            //'thumbnail' => '/' . $this->thumbnail { "title": "test", "slug": "test", "content": "<p>test</p>", "thumbnail": "/2" }
            'thumbnail' => $this->featuredImage

        ];
    }
}
