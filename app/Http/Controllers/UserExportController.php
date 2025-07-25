<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserExportController extends Controller
{
    //
      public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function exportPdf()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->get();
        $pdf = Pdf::loadView('exports.users-pdf', compact('users'));
        return $pdf->download('users.pdf');
    }
}
