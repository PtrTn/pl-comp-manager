<?php

namespace Tests\Unit\Sorting;

use App\Beurt;
use App\Sorting\GewichtSorter;
use App\Sorting\LiftSorter;
use Tests\TestCase;

class LiftSorterTest extends TestCase
{
    /**
     * @var LiftSorter
     */
    private $sorter;

    public function setUp()
    {
        $this->sorter = new LiftSorter();
    }

    public function testLowerSorting()
    {
        $beurtA = new Beurt([
            'lift' => 'squat'
        ]);
        $beurtB = new Beurt([
            'lift' => 'bench'
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertLessThan(0, $result);
    }

    public function testHigherSorting()
    {
        $beurtA = new Beurt([
            'lift' => 'bench'
        ]);
        $beurtB = new Beurt([
            'lift' => 'squat'
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertGreaterThan(0, $result);
    }

    public function testEqualsSorting()
    {
        $beurtA = new Beurt([
            'lift' => 'squat'
        ]);
        $beurtB = new Beurt([
            'lift' => 'squat'
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertEquals(0, $result);
    }
}
