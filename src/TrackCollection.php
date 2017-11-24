<?php

namespace Album;

use Iterator;
use InvalidArgumentException;

class TrackCollection implements Iterator
{
    private $tracks;

    const SORT_ALPHA = 0;
    const SORT_LENGTH = 1;

    public function __construct()
    {
        $this->position = 0;
    }

    public function add(Track $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    public function sort($mode = self::SORT_ALPHA)
    {
        switch ($mode) {
            case self::SORT_ALPHA:
                $this->sortAlpha();
                break;
            case self::SORT_LENGTH:
                $this->sortLength();
                break;
            default:
                throw new InvalidArgumentException('Invalid sort mode');
        }
    }

    public function sortAlpha()
    {
        usort($this->tracks, function ($a, $b) {
            return $a->name() <=> $b->name();
        });
    }

    public function sortLength()
    {
        usort($this->tracks, function ($a, $b) {
            return $a->duration()->timestamp() <=> $b->duration()->timestamp();
        });
    }

    public function count()
    {
        return count($this->tracks);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->tracks[$this->position];
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
        return isset($this->tracks[$this->position]);
    }
}
