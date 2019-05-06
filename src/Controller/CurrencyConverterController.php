<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class CurrencyConverterController
{
    /**
     * Simple controller to handle a route that contains currencies and an amount to be converted.
     * The route validates the desired input for use.
     * @param string $currencySource
     * @param string $currencyTarget
     * @param string $amount
     * @return JsonResponse
     */
    public function convert(string $currencySource, string $currencyTarget, string $amount): JsonResponse
    {

        return new JsonResponse(['data' => 123]);

    }
}
