<?php

namespace Slatch\CollectionsSumComparator\Arithmetic;

interface ArithmeticInterface
{
    /**
     * @param $values array Array of int|float
     * @return int|float
     */
    public function calc($values);

    /**
     * @param $values int|float
     * @return int|float
     */
    public function calcMultiple(...$values);
}
