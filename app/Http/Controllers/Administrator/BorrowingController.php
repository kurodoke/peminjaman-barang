<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Item;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Borrowing::query();

        $query->when(request()->filled('date'), function ($q) {
            return $q->whereDate('date', request('date'));
        });

        $query->when(request()->filled('status'), function ($q) {
            if (request('status') === '1') {
                return $q->whereNotNull('time_end');
            }

            return $q->whereNull('time_end');
        });

        $query->when(request()->filled('student_id'), function ($q) {
            return $q->where('student_id', request('student_id'));
        });

        $query->when(request()->filled('validate'), function ($q) {
            if (request('validate') === '1') {
                return $q->whereNotNull('validated');
            }

            return $q->whereNull('validated');
        });

        $query->when(request()->filled('item_id'), function ($q) {
            return $q->where('item_id', request('item_id'));
        });

        $borrowings = $query->with('item:id,name', 'student:id,identification_number,name')
            ->select('id', 'item_id', 'student_id', 'validated', 'date', 'time_start', 'time_end')
            ->orderBy('date', 'DESC')
            ->get();
        $students = Student::select('id', 'identification_number', 'name')->orderBy('identification_number')->get();
        $items = Item::select('id', 'name')->orderBy('name')->get();

        return view('administrator.borrowing.main.index', compact('borrowings', 'students', 'items'));
    }

    /**
     * Validate student borrowing.
     */
    public function validateBorrowing(Borrowing $borrowing): RedirectResponse
    {
        $borrowing->update([
            'validated' => "1",
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan validasi!');
    }
}
