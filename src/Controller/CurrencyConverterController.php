<?php

namespace App\Controller;

use App\Service\CurrencyConverterService;
use App\ValueObject\ConversionVO;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurrencyConverterController
{
    /**
     * Simple controller to handle a route that contains currencies and an amount to be converted.
     * The route validates the desired input for use.
     *
     * @param CurrencyConverterService $converter
     * @param string $currencySource
     * @param string $currencyTarget
     * @param string $amount
     * @return JsonResponse
     */
    public function convert(
        CurrencyConverterService $converter,
        string $currencySource,
        string $currencyTarget,
        string $amount
    ): JsonResponse {

        /**
         * I collect the given data inside of an immutable object that we can rely on later.
         * This is not fully implemented and currently misses a builder and the ->withBla() pattern.
         * @see https://blog.joefallon.net/2015/08/immutable-objects-in-php/
         */
        $conversionVO = new ConversionVO($currencySource, $currencyTarget, $amount);

        /**
         * This should in the end be the response of the controller so we can rely on what is send.
         * The implementation was currently too much so please see this as an example.
         *
         * @see https://www.thinktocode.com/2018/04/02/symfony-4-rest-api-part-2-data-transfer-object/
         */
        $conversionDTO = $converter->convert($conversionVO);


        return new JsonResponse(
            $conversionDTO->toArray()
        );

    }
}
