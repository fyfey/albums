<?php

namespace Album;

use PHPUnit\Framework\TestCase;

/**
 * @author Stuart Fyfe <sfyfe@enable.services>
 */
class AlbumTest extends TestCase
{
    /** @test */
    function from_string()
    {
        $album = Album::fromString('Pink Floyd : Momentary Lapse of Reason');

        $this->assertEquals('Pink Floyd', $album->artist());
        $this->assertEquals('Momentary Lapse of Reason', $album->name());
    }
}
