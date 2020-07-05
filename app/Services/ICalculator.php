<?php

namespace App\Services;

/**
 * Interface for Calculator, declaring the function to be implemented by Calculator Service
 */
Interface ICalculator
{

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function add(float $num1, float $num2): float;

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function subtract(float $num1, float $num2): float;

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function multiply(float $num1, float $num2): float;

    /**
     * @param float $num1
     * @param float $num2
     *
     * @return float
     */
    public function divide(float $num1, float $num2): float;

    /**
     * @param float $num1
     *
     * @return float
     */
    public function squareRoot(float $num1): float;
}
