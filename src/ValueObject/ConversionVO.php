<?php

namespace App\ValueObject;


/**
 * Class ConversionVO
 *
 * Simple and immutable object to collect the data of a conversion and provide it inside of the app.
 *
 * @see https://martinfowler.com/bliki/EvansClassification.html
 * @package App\VO
 */
class ConversionVO
{

    /** @var string */
    private $currencySource;
    /** @var string */
    private $currencyTarget;
    /** @var string */
    private $amount;

    public function __construct(string $currencySource, string $currencyTarget, string $amount)
    {
        $this->currencySource = $currencySource;
        $this->currencyTarget = $currencyTarget;
        $this->amount = $amount;
    }

    public function getCurrencySource(): string
    {
        return $this->currencySource;
    }

    public function getCurrencyTarget(): string
    {
        return $this->currencyTarget;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }
}
