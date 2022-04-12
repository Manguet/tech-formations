<?php

namespace App\Services;

use App\Interfaces\CheckNotNullableValueInterface;
use LogicException;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class VatCalculatorServices
{
    /**
     * @var CheckNotNullableValueInterface
     */
    private $checkNotNullableValue;

    /**
     * @param CheckNotNullableValueInterface $checkNotNullableValue
     */
    public function __construct(CheckNotNullableValueInterface $checkNotNullableValue)
    {
        $this->checkNotNullableValue = $checkNotNullableValue;
    }

    /**
     * Service to calculate Vat from HT price.
     * If no vat is registred, it applies a 20.0% vat
     *
     * @param float|null $price
     * @param float $vat
     *
     * @return float
     */
    public function calculatePriceHTWithVat(?float $price, float $vat = 20.0): float
    {
        $this->checkNotNullableValue->isOK($price);

        if ($price <= 0 || $vat <= 0) {
            throw new LogicException(
                'A vat or a price could not be negative or equal to 0',
                400
            );
        }

        return number_format((float)$price + ($price * $vat / 100), 2, '.', '');
    }

    /**
     * Service to calculate TVA.
     *
     * @param float|null $priceHT
     * @param float|null $priceTTC
     *
     * @return float
     */
    public function calculateVat(?float $priceHT, ?float $priceTTC): float
    {
        $this->checkNotNullableValue->isOK($priceHT);
        $this->checkNotNullableValue->isOK($priceTTC);

        if ($priceHT <= 0 || $priceTTC <= 0) {
            throw new LogicException(
                'A price could not be negative or equal to 0',
                400
            );
        }

        return (($priceTTC / $priceHT) - 1) * 100;
    }

    /**
     * @param null|float $priceTTC
     * @param null|float $vat
     *
     * @return float
     */
    public function calculateHTFromTTCAndVat(?float $priceTTC, ?float $vat): float
    {
        $this->checkNotNullableValue->isOK($priceTTC);
        $this->checkNotNullableValue->isOK($vat);

        if ($vat === 0.00) {
            throw new LogicException('A price could not be negative or equal to 0', 400);
        }

        return ($priceTTC / (1 + ($vat / 100)));
    }
}