<?php

namespace App\Weights;

use App\Weights\Dto\Plate;
use App\Weights\Dto\Plates;
use InvalidArgumentException;

class PlateCalculator
{
    /**
     * @var float
     */
    private $minimumWeight = 25;

    /**
     * @var float[]
     */
    private $allowedWeights = [
        25,
        20,
        15,
        10,
        5,
        2.5,
        1.25,
        0.5,
        0.25,
    ];

    public function getPlatesForWeight(float $weight): Plates
    {
        if ($weight < $this->minimumWeight) {
            throw new InvalidArgumentException(
                sprintf('Weight should be more than specified mimimum weight of "%s"', $this->minimumWeight)
            );
        }

        if ($weight === $this->minimumWeight) {
            return Plates::fromArray([]);
        }

        $remaining = ($weight - $this->minimumWeight) / 2;

        $plates = [];
        while ($remaining > 0) {
            $plate = $this->getNextBiggestPlate($remaining);
            $remaining -= $plate->weight;
            $plates[] = $plate;
        }
        return Plates::fromArray($plates);
    }

    private function getNextBiggestPlate(float $weight): Plate
    {
        foreach ($this->allowedWeights as $allowedWeight) {
            if ($weight >= $allowedWeight) {
                return Plate::createForWeight($allowedWeight);
            }
        }
        throw new InvalidArgumentException(sprintf('Unable to get plate for remaining weight "%s"', $weight));
    }
}
