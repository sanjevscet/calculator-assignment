<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'value' => 'bail|required|integer|gte:-2147483648|lte:2147483647',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'value.required' => 'Value is required',
            'value.integer' => 'Value must be an integer',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        $validationErrors = (new ValidationException($validator))->errors();

        $errors = [];
        foreach ($validationErrors as $key => $error) {
            $message = is_array($error) ? $error[0] : $error;
            $errors[]= ['message' =>$message, 'property'=> $key];
        }

        throw new HttpResponseException(
            response()->json(['error' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
