<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'user' => $this->when($this->relationLoaded('user'), [
                'id' => $this->user->id ?? null,
                'name' => $this->user->name ?? null,
                'email' => $this->user->email ?? null,
            ]),
            'status' => $this->when($this->relationLoaded('status'), [
                'id' => $this->status->id ?? null,
                'name' => $this->status->name ?? null,
                'label' => $this->status->label ?? null,
            ])
        ];
    }
}
