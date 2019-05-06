<?php

namespace App\Service\RateService;

/**
 * Class AwesomeRatesService
 *
 * Our connection to the Awesome Rates market where you can get the cheapest conversion rates there are! Just awesome!
 * Calculate awesome rates like a pro!
 *
 * @package App\Service\RateService
 */
class AwesomeRatesService extends AbstractRateService
{
    /**
     * Maybe this is a bad idea but you could wrap the public interface here and use a protected method on the abstract
     * class. So you could convert the rates beyond the basic implementation. This is just to show why this class
     * could be useful.
     *
     * @return float
     */
    public function getConvertedAmount(): float
    {
        return $this->doConversion();
    }
}
