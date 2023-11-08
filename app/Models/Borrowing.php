<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 * App\Models\Borrowing
 *
 * @property int $id
 * @property int $item_id
 * @property int $student_id
 * @property int $subject_id
 * @property int|null $validated
 * @property string $date
 * @property string $time_start
 * @property string|null $time_end
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Item $item
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Subject $subject
 * @method static \Database\Factories\BorrowingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereTimeEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereTimeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Borrowing withoutTrashed()
 * @mixin \Eloquent
 */
class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',  'student_id', 'subject_id', 'validated',
        'date', 'note', 'time_start', 'time_end',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function getIsReturnedStatus(): string
    {
        return $this->is_returned ? 'Sudah dikembalikan.' : 'Belum dikembalikan!';
    }

    public function getTimeEnd(): string
    {
        return $this->time_end ?? '-';
    }
}
