<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        // Generate the file name based on the current date
        $fileName = 'Hackathon_BI_2024_Users_' . Carbon::now()->format('d_m_Y') . '.xlsx';

        // Download the export with the specified file name
        return Excel::download(new UsersExport, $fileName);
    }
}
