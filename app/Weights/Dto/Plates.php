<?php

namespace App\Weights\Dto;

use Countable;

class Plates implements Countable
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
}
