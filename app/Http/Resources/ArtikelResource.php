<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ArtikelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $date = Carbon::parse($this->created_at)->locale('id');
        $date->settings(['formatFunction' => 'translatedFormat']);
        return [
            'judul' => $this->judul,
            'konten' => $this->konten,
            'kategori' => $this->kategori,
            'gambar' => $this->gambar,
            'penulis' => $this->user,
            'created_at' => $date->format('l, j F Y ; h:i a')
        ];
    }
}
