<?php

namespace Slatch\CollectionsSumComparator\Comparing;

interface ComparingInterface
{
    /**
     * @param int|float $value1
     * @param int|float $value2
     * @return bool
     */
    public function compare($value1, $value2);
}
