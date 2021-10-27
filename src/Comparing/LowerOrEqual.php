<?php

namespace Slatch\CollectionsSumComparator\Comparing;

class LowerOrEqual implements ComparingInterface
{
    public function compare($value1, $value2)
    {
        return $value1 <= $value2;
    }
}
