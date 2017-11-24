<?php

namespace Album;

use PHPUnit\Framework\TestCase;

/**
 * @author Stuart Fyfe <sfyfe@enable.services>
 */
class DurationTest extends TestCase
{
    /** @test */
    function from_string()
    {
        $sut = Duration::fromString('1:30:22');

        $this->assertEquals(1, $sut->hours());
        $this->assertEquals(30, $sut->minutes());
        $this->assertEquals(22, $sut->seconds());
    }

    /** @test */
    function to_string()
    {
        $sut = Duration::fromString('1:30:22');

        $this->assertEquals('1:30:22', (string)$sut);
    }

    /** @test */
    function to_timestamp()
    {
        $sut = Duration::fromString('1:30:22');

        $this->assertEquals(5422, $sut->timestamp());
    }

    /** @test */
    function from_timestamp()
    {
        $sut = Duration::fromTimestamp(5422);

        $this->assertEquals(1, $sut->hours());
        $this->assertEquals(30, $sut->minutes());
        $this->assertEquals(22, $sut->seconds());
    }

    /** @test */
    function add()
    {
        $one = Duration::fromString('1:30:22');
        $two = Duration::fromString('1:10:10');

        $three = $one->add($two);

        $this->assertEquals(2, $three->hours());
        $this->assertEquals(40, $three->minutes());
        $this->assertEquals(32, $three->seconds());
    }
}
