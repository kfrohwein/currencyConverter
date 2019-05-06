<?php

namespace App\Service\RateLoaderService;

use Exception;

/**
 * Class FileRateLoader
 *
 * By Single responsibility rule the loader should be a stand alone service. By this and the use of the factory
 * we can load rates from any API. In our case just a faked file.
 * @package App\Service\RateLoaderService
 */
class FileRateLoader implements RateLoaderInterface
{

    /**
     * {@inheritDoc}
     * @throws Exception
     */
    public function loadRate(string $sourceCurrency, string $targetCurrency): float
    {
        /**
         * Inside of this function we could do anything to load the data. Maybe access and REST API, SOAP, who knows.
         * I just simulate this and load a CSV file that is in my public web folder. At first I wanted to use Guzzle
         * but that is just over sized.
         */
        $handle = fopen(__DIR__.'/conversionRates.csv', 'r');
        $rate = 0;

        while (($line = fgetcsv($handle)) !== FALSE) {
            if (
                $line[0] === $sourceCurrency
                && $line[1] === $targetCurrency
            ) {
                $rate = $line[2];
                break;
            }
        }

        if (!$rate) {
            throw new Exception('No rate could be found!');
        }

        return $rate;
    }
}
