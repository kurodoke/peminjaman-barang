<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use PDF;

class BorrowingReportPrintController extends Controller
{
    public function print(string $startDate, string $endDate) {
        $borrowings = Borrowing::select('id', 'item_id', 'student_id', 'subject_id', 'validated', 'date', 'time_start', 'time_end')
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'ASC')
            ->get();

            
        // $pdf = PDF::loadView('administrator.borrowing.report.print', compact('borrowings','startDate', 'endDate' ));
        // return $pdf->stream('laporan-' . now() . '.pdf');
        return view('administrator.borrowing.report.print', compact('borrowings','startDate', 'endDate' ));
    }
}
