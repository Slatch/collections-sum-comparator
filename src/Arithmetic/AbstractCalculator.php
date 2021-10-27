<?php

namespace Slatch\CollectionsSumComparator\Arithmetic;

abstract class AbstractCalculator implements ArithmeticInterface
{
    public function calc($values)
    {
        return $this->calculate($values);
    }

    public function calcMultiple(...$values)
    {
        return $this->calculate($values);
    }

    abstract protected function calculate($values);
}
