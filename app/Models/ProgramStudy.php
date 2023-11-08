<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProgramStudy
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramStudy withoutTrashed()
 * @mixin \Eloquent
 */
class ProgramStudy extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
