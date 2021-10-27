<?php

namespace Slatch\CollectionsSumComparator\Arithmetic;

class Multiplication extends AbstractCalculator
{
    protected function calculate($values)
    {
        return array_product($values);
    }
}
