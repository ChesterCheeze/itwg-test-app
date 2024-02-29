<?php

namespace App\Imports;

use App\Models\ExcelData;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            ExcelData::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address'],
            ]);
        }
    }
}
