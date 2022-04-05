<?php

namespace App\Tests\Services;

use App\Services\VatCalculatorServices;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class VatCalculatorTest extends KernelTestCase
{
    /**
     * @return void
     */
    public function testWithNullValues(): void
    {
        self::bootKernel();

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.'.VatCalculatorServices::class);

        $price = null;

        $this->expectException(LogicException::class);
        $vatCalculator->calculatePriceHTWithVat($price);
    }

    /**
     * @return void
     */
    public function testWithNullPriceValue(): void
    {
        self::bootKernel();

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.'.VatCalculatorServices::class);

        $price = null;
        $vat   = 10.00;

        $this->expectException(LogicException::class);
        $vatCalculator->calculatePriceHTWithVat($price, $vat);
    }

    /**
     * @return void
     */
    public function testWithNullVatValue(): void
    {
        self::bootKernel();

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.'.VatCalculatorServices::class);

        $price = 10.0;

        $priceWithVat = $vatCalculator->calculatePriceHTWithVat($price);

        $this->assertEquals(
            12.00,
            $priceWithVat
        );
    }

    /**
     * @return void
     */
    public function testWithManyValidValues(): void
    {
        self::bootKernel();

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.'.VatCalculatorServices::class);

        $toTestValues = [
            [
                'price' => 60,
                'vat'   => 5.5,
                'result' => 63.30
            ],
            [
                'price' => 80000,
                'vat'   => 20,
                'result' => 96000.00
            ],
            [
                'price' => 2.43,
                'vat'   => 10,
                'result' => 2.67
            ],
        ];

        foreach ($toTestValues as $toTestValue) {

            $newPrice = $vatCalculator->calculatePriceHTWithVat($toTestValue['price'], $toTestValue['vat']);

            $this->assertEquals($toTestValue['result'], $newPrice);
        }
    }

    /**
     * @return void
     */
    public function testWithNegativePrice(): void
    {
        self::bootKernel();

        $price = -10.00;

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.' . VatCalculatorServices::class);

        $this->expectException(LogicException::class);
        $vatCalculator->calculatePriceHTWithVat($price);
    }

    /**
     * @return void
     */
    public function testWithNegativeVat(): void
    {
        self::bootKernel();

        $price = 10.00;
        $vat   = -5.5;

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.' . VatCalculatorServices::class);

        $this->expectException(LogicException::class);
        $vatCalculator->calculatePriceHTWithVat($price, $vat);
    }

    /**
     * @return void
     */
    public function testWithPriceEqualToZero(): void
    {
        self::bootKernel();

        $price = 0;

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.' . VatCalculatorServices::class);

        $this->expectException(LogicException::class);
        $vatCalculator->calculatePriceHTWithVat($price);
    }

    /**
     * @return void
     */
    public function testWithVatEqualToZero(): void
    {
        self::bootKernel();

        $price = 10.00;
        $vat   = 0;

        $vatCalculator = self::$kernel->getContainer()
            ->get('test.' . VatCalculatorServices::class);

        $this->expectException(LogicException::class);
        $vatCalculator->calculatePriceHTWithVat($price, $vat);
    }
}