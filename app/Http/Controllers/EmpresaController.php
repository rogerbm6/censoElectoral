<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Empresa;
use App\Imports\EmpresaImport;

class EmpresaController extends Controller
{

    public function importExcel(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new EmpresaImport, $file);

        return back()->with('message', 'bien hecho');
    }
}
