<?php

namespace Tests\Unit\Sorting;

use App\Beurt;
use App\Sorting\GewichtSorter;
use Tests\TestCase;

class GewichtSorterTest extends TestCase
{
    /**
     * @var GewichtSorter
     */
    private $sorter;

    public function setUp()
    {
        $this->sorter = new GewichtSorter();
    }

    public function testLowerSorting()
    {
        $beurtA = new Beurt([
            'gewicht' => 100
        ]);
        $beurtB = new Beurt([
            'gewicht' => 120
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertLessThan(0, $result);
    }

    public function testHigherSorting()
    {
        $beurtA = new Beurt([
            'gewicht' => 120
        ]);
        $beurtB = new Beurt([
            'gewicht' => 100
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertGreaterThan(0, $result);
    }

    public function testEqualsSorting()
    {
        $beurtA = new Beurt([
            'gewicht' => 100
        ]);
        $beurtB = new Beurt([
            'gewicht' => 100
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertEquals(0, $result);
    }
}
