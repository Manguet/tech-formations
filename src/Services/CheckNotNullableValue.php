<?php

namespace App\Services;

use App\Interfaces\CheckNotNullableValueInterface;
use LogicException;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class CheckNotNullableValue implements CheckNotNullableValueInterface
{
    /**
     * @param null|mixed $value
     *
     * @return void
     */
    public function isOK($value): void
    {
        if (null === $value)
        {
            throw new LogicException(
                'La valeur envoyée ne peut être null',
                400
            );
        }
    }
}