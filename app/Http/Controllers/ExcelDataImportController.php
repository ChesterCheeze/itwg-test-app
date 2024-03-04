<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcelData;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;

class ExcelDataImportController extends Controller
{
    public function import(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $import = new ExcelImport();
        Excel::import($import, $file);

        $data = $import->getData();
        
        
        // Redirect the user back to the import page with a success message
       return back()->with([
            'success' => 'Excel data imported successfully.',
            'data' => $data]);
    }
}
