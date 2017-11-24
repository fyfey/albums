<?php

namespace Album;

use PHPUnit\Framework\TestCase;

/**
 * @author Stuart Fyfe <sfyfe@enable.services>
 */
class TrackCollectionTest extends TestCase
{
    /** @test */
    function add()
    {
        $collection = new TrackCollection;

        $collection
            ->add(Track::fromString('0:03:40 - One Slip'))
            ->add(Track::fromString('0:02:24 - On The Turning Away'));

        $this->assertEquals(2, $collection->count());
    }

    /** @test */
    function can_iterate()
    {
        $collection = new TrackCollection;

        $collection
            ->add(Track::fromString('0:03:40 - One Slip'))
            ->add(Track::fromString('0:02:24 - On The Turning Away'));

        $count = 0;
        foreach ($collection as $track) {
            $count++;
        }

        $this->assertEquals(2, $count);
    }

    /** @test */
    function sort_alpha()
    {
        $collection = new TrackCollection;
        $collection
            ->add(Track::fromString('0:02:24 - On The Turning Away'))
            ->add(Track::fromString('0:04:55 - Abzug'));

        $collection->sort();

        $this->assertEquals('Abzug', $collection->current()->name());
    }

    /** @test */
    function sort_length()
    {
        $collection = new TrackCollection;
        $collection
            ->add(Track::fromString('0:04:55 - Abzug'))
            ->add(Track::fromString('0:02:24 - On The Turning Away'));

        $collection->sort(TrackCollection::SORT_LENGTH);

        $this->assertEquals('On The Turning Away', $collection->current()->name());
    }
}
