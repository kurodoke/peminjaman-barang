<?php

namespace App\Repositories;

use App\Models\Borrowing;

class BorrowingRepository
{
    public function __construct(
        private Borrowing $model
    ) {
    }

    /**
     * Get item that are not returned by student.
     */
    public function getItemsNotReturnedByStudent(): object
    {
        return $this->model->select('id', 'student_id', 'item_id', 'date', 'time_end')
            ->with('student:id,identification_number,name,email,phone_number', 'item:id,name')
            ->whereNull('time_end')->orderBy('date', 'DESC')->get();
    }

    /**
     * Get the count of borrowings by student ID.
     */
    public function countTotalBorrowingByStudentID(string $studentID): int
    {
        return $this->model->select('id', 'student_id')->where('student_id', $studentID)->count();
    }

    /**
     * Count student borrowing returned status.
     * true if borrowing is already returned
     * or false if it is not returned.
     *
     * @param  bool  $isReturned the status boolean true or false
     */
    public function countStudentBorrowingReturnedStatus(string $studentID, bool $isReturned): int
    {
        if ($isReturned) {
            return $this->model->select('id', 'student_id', 'time_end')
                ->where('student_id', $studentID)
                ->whereNotNull('time_end')
                ->count();
        }

        return $this->model->select('id', 'student_id', 'time_end')
            ->where('student_id', $studentID)
            ->whereNull('time_end')
            ->count();
    }
}
