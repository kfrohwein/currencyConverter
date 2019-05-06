<?php

namespace App\Service\RateService;

use App\Service\RateLoaderService\RateLoaderInterface;
use App\ValueObject\ConversionVO;

abstract class AbstractRateService implements RateServiceInterface
{

    /** @var ConversionVO */
    protected $conversionVO;

    /** @var RateLoaderInterface */
    protected $rateLoader;

    /** @var string */
    private $message;

    /**
     * AbstractRateService constructor.
     * @param ConversionVO $conversionVO
     * @param RateLoaderInterface $rateLoader
     */
    public function __construct(ConversionVO $conversionVO, RateLoaderInterface $rateLoader)
    {
        $this->conversionVO = $conversionVO;
        $this->rateLoader = $rateLoader;
    }


    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    protected function doConversion(): float
    {
        $amount = 0;
        try {
            $rate = $this->rateLoader->loadRate(
                $this->conversionVO->getCurrencySource(),
                $this->conversionVO->getCurrencyTarget()
            );

            $amount = $rate * $this->conversionVO->getAmount();
            $this->setMessage('All went well. Thank you for using awesome rates!');

        } catch (\Exception $e) {
            $this->setMessage(
                sprintf("Oh no it didn't work! Problem was: %s", $e->getMessage())
            );
        }

        return $amount;
    }
}
