<?php

namespace App\Weights\Dto;

use ArrayIterator;
use Countable;
use IteratorAggregate;

class Plates implements Countable, IteratorAggregate
{
    /**
     * @var Plate[]
     */
    public $plates;

    private function __construct(array $plates)
    {
       $this->plates = $plates;
    }

    public static function fromArray(array $plates): self
    {
        return new self($plates);
    }

    public function count(): int
    {
        return count($this->plates);
    }

    public function reverse(): array
    {
        return array_reverse($this->plates);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->plates);
    }
}
