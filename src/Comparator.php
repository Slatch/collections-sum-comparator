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
    public function compareMultiple($value, ...$compared)
    {
        while (true) {
            // Calculate values
            $calculations = [];
            foreach ($compared as $values) {
                $calculations[key($values)] = current($values);
            }
            $val = $this->arithmeticService->calc($calculations);

            // Compare values
            if ($this->comparingService->compare($val, $value)) {
                yield $calculations;
            }

            // Move pointers
            $iterator = count($compared) - 1;
            while (true) {
                if (next($compared[$iterator])) {
                    break;
                }
                if ($iterator === 0) {
                    break 2;
                }
                reset($compared[$iterator]);
                $iterator--;
            }
        }
    }

    public function compare($value, $compare1, $compare2)
    {
        while (true) {
            $val = $this->arithmeticService->calcMultiple(current($compare1), current($compare2));
            if ($this->comparingService->compare($val, $value))
                yield [
                    key($compare1) => current($compare1),
                    key($compare2) => current($compare2),
                ];

            if (!next($compare2) && reset($compare2) && !next($compare1))
                break;
        }
    }
}
