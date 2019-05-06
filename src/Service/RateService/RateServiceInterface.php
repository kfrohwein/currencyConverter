<?php

namespace App\Service\RateService;

interface RateServiceInterface
{

    /**
     * Calculate the final amount
     * @return float
     */
    public function getConvertedAmount(): float;

    /**
     * Return any status message.
     * @return string
     */
    public function getMessage(): string;
}
