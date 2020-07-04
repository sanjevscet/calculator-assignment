<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalculatorRequest;
use App\Http\Services\CalculatorService;
use App\Http\Requests\CalculatorUnaryRequest;

class CalculatorController extends Controller
{
    private $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    private function getJsonResponse(float $answer): JsonResponse
    {
        return response()->json([
            'answer' => $answer
        ]);
    }

    /**
     * Add num1 & num2
     *
     * @param CalculatorRequest $request
     *
     * @return JsonResponse
     */
    public function add(CalculatorRequest $request): JsonResponse
    {
        ['num1' => $num1, 'num2' => $num2] = $request->input(); // unpacking array values
        // calling add() of CalculatorService
        $answer = $this->calculatorService->add($num1, $num2);

        return $this->getJsonResponse($answer);
    }

    /**
     * Subtract num2 from num1
     *
     * @param CalculatorRequest $request
     *
     * @return JsonResponse
     */
    public function subtract(CalculatorRequest $request): JsonResponse
    {
        ['num1' => $num1, 'num2' => $num2] = $request->input(); // unpacking array values
        // calling subtract() of CalculatorService
        $answer = $this->calculatorService->subtract($num1, $num2);

        return $this->getJsonResponse($answer);
    }

    /**
     * Multiply num1 and num2
     *
     * @param CalculatorRequest $request
     *
     * @return JsonResponse
     */
    public function multiply(CalculatorRequest $request): JsonResponse
    {
        ['num1' => $num1, 'num2' => $num2] = $request->input(); // unpacking array values
        // calling multiply() of CalculatorService
        $answer = $this->calculatorService->multiply($num1, $num2);

        return $this->getJsonResponse($answer);
    }

    /**
     * Divide num1 by num2
     *
     * @param CalculatorRequest $request
     *
     * @return JsonResponse
     */
    public function divide(CalculatorRequest $request): JsonResponse
    {
        ['num1' => $num1, 'num2' => $num2] = $request->input(); // unpacking array values
        // calling divide() of CalculatorService
        try{
            $answer = $this->calculatorService->divide($num1, $num2);
        } catch(\Exception $e) {
            throw new HttpResponseException(
            response()->json(['error' => $e->getMessage()], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
          );
        }

        return $this->getJsonResponse($answer);
    }

    /**
     * Return Square Root of a given number
     *
     * @param CalculatorUnaryRequest $request
     *
     * @return JsonResponse
     */
    public function squareRoot(CalculatorUnaryRequest $request): JsonResponse
    {
        $num1 = $request->input('num1');
        // calling squareRoot() of CalculatorService
        $answer = $this->calculatorService->squareRoot($num1);

        return $this->getJsonResponse($answer);
    }
}
