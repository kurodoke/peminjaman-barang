<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingRequest extends FormRequest
{
    protected $errorBag = 'store';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'item_id' => 'required|min:1|exists:items,id',
            'subject_id' => 'required|min:1|exists:subjects,id',
            'date' => 'required|date',
            'time_start' => 'required|date_format:H:i',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'item_id.required' => 'Kolom barang wajib diisi!',
            'item_id.min' => 'Kolom barang tidak valid!',
            'item_id.exists' => 'Kolom barang tidak valid!',

            'subject_id.required' => 'Kolom mata kuliah wajib diisi!',
            'subject_id.min' => 'Kolom mata kuliah tidak valid!',
            'subject_id.exists' => 'Kolom mata kuliah tidak valid!',

            'date.required' => 'Kolom tanggal wajib diisi!',
            'date.date' => 'Kolom tanggal tidak valid!',

            'time_start.required' => 'Kolom jam pinjam wajib diisi!',
            'time_start.date_format' => 'Kolom jam pinjam tidak valid!',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'student_id' => auth('student')->id(),
        ]);
    }
}
