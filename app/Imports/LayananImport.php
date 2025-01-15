<?php

namespace App\Imports;

use App\Models\Layanan;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LayananImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            Layanan::create([
                'nama_layanan' => $row['nama'],
                'biaya'=> $row['biaya']
            ]);

        }
    }
}
