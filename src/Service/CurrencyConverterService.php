<?php

namespace App\Service;

use App\DataTransferObject\ConversionDTO;
use App\ValueObject\ConversionVO;

class CurrencyConverterService
{

    /**
     * Convert the given amount to the desired currency.
     *
     * @param ConversionVO $conversionVO
     * @return ConversionDTO
     */
    public function convert(ConversionVO $conversionVO
    ): ConversionDTO {



        return new ConversionDTO(
            $conversionVO->getCurrencyTarget(),
            100,
            'All went well'
        );
    }
}
