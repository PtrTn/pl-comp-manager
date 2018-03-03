<?php

namespace Tests\Unit\Sorting;

use App\Weights\PlateCalculator;
use Tests\TestCase;

class PlateCalculatorTest extends TestCase
{
    /**
     * @var PlateCalculator
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new PlateCalculator();
    }

    public function test60kg()
    {
        $plates = $this->calculator->getPlatesForWeight(65);
        $this->assertCount(1, $plates);
        $this->assertEquals(20, $plates->plates[0]->weight);
    }

    public function testSmallPlates()
    {
        $plates = $this->calculator->getPlatesForWeight(122.5);
        $this->assertCount(4, $plates);
        $this->assertEquals(25, $plates->plates[0]->weight);
        $this->assertEquals(20, $plates->plates[1]->weight);
        $this->assertEquals(2.5, $plates->plates[2]->weight);
        $this->assertEquals(1.25, $plates->plates[3]->weight);
    }

    public function testMultipleBigPlates()
    {
        $plates = $this->calculator->getPlatesForWeight(175);
        $this->assertCount(3, $plates);
        $this->assertEquals(25, $plates->plates[0]->weight);
        $this->assertEquals(25, $plates->plates[1]->weight);
        $this->assertEquals(25, $plates->plates[2]->weight);
    }

    public function testExceptionOnMinimumWeight()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Weight should be more than specified mimimum weight of "25"');
        $this->calculator->getPlatesForWeight(20);
    }

    public function testExceptionOnInvalidWeight()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to get plate for remaining weight "0.2"');
        $this->calculator->getPlatesForWeight(25.4);
    }
}
