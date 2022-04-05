<?php

namespace App\Interfaces;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
interface CheckNotNullableValueInterface
{
    /**
     * @param null|mixed $value
     *
     * @return void
     */
    public function isOK($value): void;
}