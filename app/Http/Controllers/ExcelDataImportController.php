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

        Excel::import(new ExcelImport, $file);


       // Return raw data
         return redirect()->back()->with('status', 'Import Successfully');
//
//            $importeData[] = $excelData;
//        }
//
//        // Redirect the user back to the import page with a success message
//       return back()->with([
//            'success' => 'Excel data imported successfully.',
//            'data' => $importeData]);
    }
}
