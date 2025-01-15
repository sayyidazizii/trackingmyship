<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class viewPengirimanResource extends JsonResource
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
            'kode' => $this->kode,
            'tanggal' => $this->tanggal,
            'nama' => $this->penerima->nama,
            'tujuan' => $this->lokasi_tujuan,
            'berat' => $this->paket->berat,
            'kurir' => $this->kurir->nama_kurir,
            'akun' => $this->akun->fullname,
            'deskripsi' => $this->paket->deskripsi,
            'id_dompet' => $this->akun->dompet->saldo,
        ];
        // return [
        //     'nama' => $this->nama_layanan,
        //     'biaya' => $this->biaya,
        // ];
    }
}
