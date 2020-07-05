<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalculatorRequest extends FormRequest
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
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
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
            'num1.required' => 'Num1 is required',
            'num2.required' => 'Num2 is required',
            'num1.numeric' => 'Num1 must be number only',
            'num2.numeric' => 'Num2 must be number only',
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
