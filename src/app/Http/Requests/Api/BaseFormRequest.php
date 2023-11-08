<?php

namespace App\Http\Requests\Api;

use App\Traits\ResponseJson;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseFormRequest extends FormRequest
{
    use ResponseJson;

    protected $validateErrors = [];

    /**
     * バリデーション失敗時エラーハンドリング
     *
     * @param Validator $validator
     * @throws HttpResponseException
     * @see FormRequest::failedValidation()
     */
    protected function failedValidation(Validator $validator)
    {
        $this->setStatusCode(400);
        foreach ($validator->errors()->toArray() as $errors)
        {
            if (isset($errors[0]))
            {
                array_push($this->validateErrors, $errors[0]);
            }
        }
        $this->setErrorMessages($this->validateErrors);

        throw new HttpResponseException($this->responseFailed());
    }
}
