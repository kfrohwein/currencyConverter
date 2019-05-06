<?php

namespace App\Service\RateLoaderService;

interface RateLoaderInterface
{
    /**
     * Load a rate for conversion.
     *
     * @param string $sourceCurrency
     * @param string $targetCurrency
     * @return float
     */
    public function loadRate(string $sourceCurrency, string $targetCurrency): float;
}
