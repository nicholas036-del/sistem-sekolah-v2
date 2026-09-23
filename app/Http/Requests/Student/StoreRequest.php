<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:L,P'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class'  => ['required', 'string'],
        ];
    }

    public function messages()
    { 
        return [
            'nis.required'=>'Nomor Induk Siswa wajib diisi',
            'nis.size'=>'Nomor Induk Siswa harus terdiri dari 4 karakter',
        ];
    }
}
