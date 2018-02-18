<?php

namespace Tests\Unit\Sorting;

use App\Beurt;
use App\Sorting\BeurtnummerSorter;
use App\Sorting\GewichtSorter;
use App\Sorting\LiftSorter;
use Tests\TestCase;

class BeurtnummerSorterTest extends TestCase
{
    /**
     * @var BeurtnummerSorter
     */
    private $sorter;

    public function setUp()
    {
        $this->sorter = new BeurtnummerSorter();
    }

    public function testLowerSorting()
    {
        $beurtA = new Beurt([
            'beurtnummer' => 1
        ]);
        $beurtB = new Beurt([
            'beurtnummer' => 2
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertLessThan(0, $result);
    }

    public function testHigherSorting()
    {
        $beurtA = new Beurt([
            'beurtnummer' => 2
        ]);
        $beurtB = new Beurt([
            'beurtnummer' => 1
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertGreaterThan(0, $result);
    }

    public function testEqualsSorting()
    {
        $beurtA = new Beurt([
            'beurtnummer' => 2
        ]);
        $beurtB = new Beurt([
            'beurtnummer' => 2
        ]);
        $result = $this->sorter->sort($beurtA, $beurtB);
        $this->assertEquals(0, $result);
    }
}
