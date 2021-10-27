<?php

namespace Slatch\CollectionsSumComparator\Comparing;

class GreatOrEqual implements ComparingInterface
{
    public function compare($value1, $value2)
    {
        return $value1 <= $value2;
    }
}
