<?php

namespace Album;

use Iterator;

class AlbumCollection implements Iterator
{
    private $albums = [];

    public function __construct()
    {
        $this->position = 0;
    }

    public static function fromArray($data)
    {
        $collection = new static;
        foreach ($data as $row) {
            if (!$this->isTrack($row)) {
                $album = Album::fromString($row);
                $collection->add($album);
            }
            $album->addTrack(Track::fromString($row));
        }
    }

    public function sortByName()
    {
        usort($this->albums, function($a, $b) {
            return $a->name() <=> $b->name();
        });
    }

    public function sortByArtist()
    {
        usort($this->albums, function($a, $b) {
            return $a->artist() <=> $b->artist();
        });
    }

    public function add(Album $album)
    {
        $this->albums[] = $album;

        return $this;
    }

    public function count()
    {
        return count($this->albums);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->albums[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->albums[$this->position]);
    }
}
