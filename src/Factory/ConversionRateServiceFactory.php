<?php

namespace App\Factory;

use App\Service\RateLoaderService\FileRateLoader;
use App\Service\RateService\AwesomeRatesService;
use App\Service\RateService\RateServiceInterface;
use App\ValueObject\ConversionVO;

/**
 * Class ConversionRateServiceFactory
 * To support various conversion rate backend we could use a factory here.
 * Maybe the frontend could set it or we decide here by the used currency or moon phase who knows.
 *
 * @package App\Service\CurrencyConversionFactory
 */
class ConversionRateServiceFactory
{
    public function get(ConversionVO $conversionVO): RateServiceInterface
    {
        $instance = null;

        // imho the factory should decide by the provided data what to do.
        switch ($conversionVO->getCurrencySource()) {
            case'EUR':
            case 'USD':
            default:
                $instance = new AwesomeRatesService($conversionVO, new FileRateLoader());
                break;
        }

        return $instance;
    }
}
