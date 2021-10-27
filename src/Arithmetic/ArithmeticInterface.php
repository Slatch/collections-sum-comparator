<?php

namespace Slatch\CollectionsSumComparator\Arithmetic;

interface ArithmeticInterface
{
    /**
     * @param $values array of int|float
     * @return int|float
     */
    public function calc($values);
}
