<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Item;
use App\Models\Student;
use App\Repositories\BorrowingRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private BorrowingRepository $repository
    ) {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $borrowingsNotReturned = $this->repository->getItemsNotReturnedByStudent();

        $counts = [
            'student' => Student::select('id')->count(),
            'administrator' => Administrator::select('id')->count(),
            'items' => Item::select('id')->count(),
            'itemsNotReturned' => $borrowingsNotReturned->count()
        ];

        return view('administrator.dashboard', compact('counts', 'borrowingsNotReturned'));
    }
}
