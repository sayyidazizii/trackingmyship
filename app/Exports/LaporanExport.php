<?php

namespace App\Exports;

use App\Models\Pengiriman;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Pengiriman::query();
    }

    public function map($pengiriman): array
    {
        return [
            $pengiriman->kode,
            $pengiriman->tanggal,
            $pengiriman->lokasi_tujuan,
            $pengiriman->penerima->nama,
            $pengiriman->layanan->nama_layanan,
            $pengiriman->paket->deskripsi,
        ];
    }

    public function headings(): array
    {
        return [
            "Kode",
            "Tanggal",
            "Lokasi Penerima",
            "Nama Penerima",
            "Nama Layanan",
            "Detail Paket",
        ];
    }
}
