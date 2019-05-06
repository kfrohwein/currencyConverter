<?php

namespace App\DataTransferObject;


/**
 * Class ConversionDTO
 *
 * Value object to define the response of a conversion that we send back as json inside of the controller.
 * @see https://www.martinfowler.com/eaaCatalog/dataTransferObject.html
 *
 * @package App\DTO
 */
class ConversionDTO
{
    /** @var string */
    private $currency;
    /** @var float */
    private $amount;
    /** @var string */
    private $message;

    /**
     * ConversionDTO constructor.
     * @param string $currency
     * @param float $amount
     * @param string $message
     */
    public function __construct(string $currency, float $amount, string $message)
    {
        $this->currency = $currency;
        $this->amount = $amount;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Collect all set data in one array.
     * @return array
     */
    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'amount' => $this->amount,
            'message' => $this->message,
        ];
    }

}
