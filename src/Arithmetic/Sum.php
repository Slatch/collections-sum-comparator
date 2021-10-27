<?php

namespace Slatch\CollectionsSumComparator\Arithmetic;

class Sum implements ArithmeticInterface
{
    public function calc($values)
    {
        return array_sum($values);
    }
}
