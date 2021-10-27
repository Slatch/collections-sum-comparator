<?php

namespace Slatch\CollectionsSumComparator;

use Slatch\CollectionsSumComparator\Arithmetic\ArithmeticInterface;
use Slatch\CollectionsSumComparator\Comparing\ComparingInterface;

class Comparator
{
    /** @var ArithmeticInterface */
    private $arithmeticService;
    /** @var ComparingInterface */
    private $comparingService;

    public function __construct(ArithmeticInterface $arithmetic, ComparingInterface $comparing)
    {
        $this->arithmeticService = $arithmetic;
        $this->comparingService = $comparing;
    }

    /**
     * @param int|float $value
     */
    public function compare($value, ...$arrays)
    {
        while (true) {
            // Calculate values
            $calculations = [];
            foreach ($arrays as $values) {
                $calculations[key($values)] = current($values);
            }
            $val = $this->arithmeticService->calc($calculations);

            // Compare values
            if ($this->comparingService->compare($val, $value)) {
                yield $calculations;
            }

            // Move pointers
            $iterator = count($arrays) - 1;
            while (true) {
                if (next($arrays[$iterator])) {
                    break;
                }
                if ($iterator === 0) {
                    break 2;
                }
                reset($arrays[$iterator]);
                $iterator--;
            }
        }
    }

    /**
     * @param int|float $value
     */
    public function compare2($value, $arr1, $arr2, $arr3)
    {
        while (true) {
            $val = $this->arithmeticService->calc(current($arr1), current($arr2), current($arr3));
            if ($this->comparingService->compare($val, $value))
                yield [
                    key($arr1) => current($arr1),
                    key($arr2) => current($arr2),
                    key($arr3) => current($arr3),
                ];

            if (!next($arr3) && reset($arr3) && !next($arr2) && reset($arr2) && !next($arr1))
                break;
        }
    }
}
