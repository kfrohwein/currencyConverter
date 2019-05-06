<?php

namespace App\Service;

use App\DataTransferObject\ConversionDTO;
use App\Factory\ConversionRateServiceFactory;
use App\ValueObject\ConversionVO;

class CurrencyConverterService
{

    /** @var ConversionRateServiceFactory */
    private $conversionRateFactory;

    /**
     * CurrencyConverterService constructor.
     * @param ConversionRateServiceFactory $conversionRateFactory
     */
    public function __construct(ConversionRateServiceFactory $conversionRateFactory)
    {
        $this->conversionRateFactory = $conversionRateFactory;
    }

    /**
     * Convert the given amount to the desired currency.
     *
     * @param ConversionVO $conversionVO
     * @return ConversionDTO
     */
    public function convert(ConversionVO $conversionVO
    ): ConversionDTO {

        $ratesService = $this->conversionRateFactory->get($conversionVO);

        // The message handling like this is not a really good idea...
        // In the end this need exceptions, translation, shouldn't be in the rate service and probably a more
        // complex response.
        return new ConversionDTO(
            $conversionVO->getCurrencyTarget(),
            $ratesService->getConvertedAmount(),
            $ratesService->getMessage()
        );
    }
}
