<?php

namespace App\Weights\Dto;

class Plate
{
    /**
     * @var float
     */
    public $weight;

    private function __construct(float $weight)
    {
        $this->weight = $weight;
    }

    public static function createForWeight(float $weight): self
    {
        return new self($weight);
    }
}
