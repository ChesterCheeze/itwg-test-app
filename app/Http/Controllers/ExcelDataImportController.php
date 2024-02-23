<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcelData;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDataImportController extends Controller
{
    public function import(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        // Load data from the Excel file
       // $data = Excel::load($file, function($reader) {
       //     $reader->all();
       // })->get();

       $importeData = [];

       $data = [
        [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'address' => '123 Main St'
        ]
       ];

        foreach ($data as $key => $value) {
            $excelData = new ExcelData();
            $excelData->name = $value['name'];
            $excelData->email = $value['email'];
            $excelData->phone = $value['phone'];
            $excelData->address = $value['address'];
            $excelData->save();

            $importeData[] = $excelData;
        }

        // Redirect the user back to the import page with a success message
       return back()->with([
            'success' => 'Excel data imported successfully.',
            'data' => $importeData]);
    }
}
