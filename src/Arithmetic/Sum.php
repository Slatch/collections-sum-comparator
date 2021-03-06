<?php

namespace Slatch\CollectionsSumComparator\Arithmetic;

class Sum extends AbstractCalculator
{
    protected function calculate($values)
    {
        return array_sum($values);
    }
}
