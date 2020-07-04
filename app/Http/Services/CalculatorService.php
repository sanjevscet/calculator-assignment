<?php

namespace App\Http\Services;

/**
 * Our Calculator Service
 */
final class CalculatorService implements ICalculator
{

    /**
     * @param float $answer
     *
     * @return float
     */
    private function roundTheAnswer(float $answer): float {
        return round($answer, 2);
    }

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function add(float $num1, float $num2): float
    {
		return $this->roundTheAnswer($num1 + $num2);
    }

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function subtract(float $num1, float $num2): float
    {
		return $this->roundTheAnswer($num1 - $num2);
    }

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function multiply(float $num1, float $num2): float
    {
		return $this->roundTheAnswer($num1 * $num2);
    }

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function divide(float $num1, float $num2): float
    {
      $answer = 0;
      try {
          $answer = $num1/$num2;
      } catch(\DivisionByZeroError $e) {
          throw new \DivisionByZeroError($e->getMessage());
      }

	    return $this->roundTheAnswer($num1 / $num2);
    }


    /**
     * @param float $num1
     *
     * @return float
     */
    public function squareRoot(float $num1): float
    {
		return $this->roundTheAnswer(sqrt($num1));
    }

}
