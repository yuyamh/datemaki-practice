<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'level' => ['required', Rule::in(['A1', 'A2', 'B1', 'B2', 'C1', 'C2'])],
            'file_name' => [
                'file',
                // 拡張子
                'mimes:pdf,docx,zip,xlsx,jpeg,jpg,png',
                // MIMEタイプ：Word, Excel, Zip, PDF
                'mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/zip,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/jpeg,image/png',
            ],
            'text_id' => 'nullable|exists:texts,id',
        ];

        return $rules;
    }
}
