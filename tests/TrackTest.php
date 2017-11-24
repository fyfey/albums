<?php

namespace Album;

use PHPUnit\Framework\TestCase;

/**
 * @author Stuart Fyfe <sfyfe@enable.services>
 */
class TrackTest extends TestCase
{
    /** @test */
    function from_string()
    {
        $track = Track::fromString('0:04:24 - Signs of Life');

        $this->assertEquals('Signs of Life', $track->title());
        $this->assertEquals('0:04:24', (string)$track->duration());
    }
}
