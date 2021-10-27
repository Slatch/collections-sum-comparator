<?php

namespace Slatch\CollectionsSumComparator\Comparing;

class Great implements ComparingInterface
{
    public function compare($value1, $value2)
    {
        return $value1 < $value2;
    }
}
