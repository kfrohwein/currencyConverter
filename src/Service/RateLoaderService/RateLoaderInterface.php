<?php

namespace App\Service\RateLoaderService;

interface RateLoaderInterface
{
    /**
     * Load a rate for conversion.
     *
     * @param string $currencySource
     * @param string $currencyTarget
     * @return float
     */
    public function loadRate(string $currencySource, string $currencyTarget): float;
}
