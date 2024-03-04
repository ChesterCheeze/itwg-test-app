<?php

namespace App\Imports;

use App\Models\ExcelData;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToCollection, WithHeadingRow
{
    /**
     * @var array
     */
    protected $data = [];

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $rows->each(function ($row) {
        $this->processRow($row);
        });
    }

    protected function processRow($row)
    {
        $person = ExcelData::firstOrNew(['email' => $row['email']]);
        
        if ($person->exists) {
            $action = 'existed';
            $person->update([
                'name' => $row['name'],
                'phone' => $row['phone'],
                'address' => $row['address'],
            ]);
            if ($person->wasChanged()) {
                $action = 'updated';
            }
        } else {
            $person->fill([
                'name' => $row['name'],
                'phone' => $row['phone'],
                'address' => $row['address'],
            ])->save();
            $action = 'created';
        }

        $row['action'] = $action;
        $this->data[] = $row;
    }

    public function getData()
    {
        return $this->data;
    }
}
