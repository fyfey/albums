<?php

namespace Album;

use PHPUnit\Framework\TestCase;

/**
 * @author Stuart Fyfe <sfyfe@enable.services>
 */
class AlbumCollectionTest extends TestCase
{
    /** @test */
    function add()
    {
        $collection = new AlbumCollection;

        $collection
            ->add(Album::fromString('Pink Floyd : Momentary Lapse of Reason'))
            ->add(Album::fromString('Pink Floyd : Animals'));

        $this->assertEquals(2, $collection->count());
    }

    /** @test */
    function can_iterate()
    {
        $collection = new AlbumCollection;

        $collection
            ->add(Album::fromString('Pink Floyd : Momentary Lapse of Reason'))
            ->add(Album::fromString('Pink Floyd : Animals'));

        $count = 0;
        foreach ($collection as $album) {
            $count++;
        }

        $this->assertEquals(2, $count);
    }

    /** @test */
    function sort_by_album_name()
    {
        $collection = new AlbumCollection;
        $collection
            ->add(Album::fromString('Pink Floyd : Momentary Lapse of Reason'))
            ->add(Album::fromString('Pink Floyd : Animals'));

        $collection->sortByName();

        $this->assertEquals('Animals', $collection->current()->name());
    }

    /** @test */
    function sort_by_artist_name()
    {
        $collection = new AlbumCollection;
        $collection
            ->add(Album::fromString('Pulp : Different Class'))
            ->add(Album::fromString('Pink Floyd : Momentary Lapse of Reason'));

        $collection->sortByArtist();

        $this->assertEquals('Pink Floyd', $collection->current()->artist());
    }
}
