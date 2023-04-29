<?php

namespace App\Http\Controllers;

use App\Imports\TeachersImport;
use App\Imports\ParticipantsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importP()
    {
        $import = new ParticipantsImport();
        $import->setStartRow(2);

        Excel::import($import,request()->file('file'));
        return back();
    }
    public function importT()
    {
        $import = new TeachersImport();
        $import->setStartRow(2);

        Excel::import($import,request()->file('file'));
        return back();
    }
}
