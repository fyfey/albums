<?php

namespace Album;

class Album
{
    private $name;
    private $artist;

    private $tracks = [];

    public function __construct($name, $artist)
    {
        $this->name = $name;
        $this->artist = $artist;
        $this->tracks = new TrackCollection;
    }

    public static function fromString($string)
    {
        preg_match('/(.+) : (.+)/', $string, $parts);

        $album = new static($parts[2], $parts[1]);

        return $album;
    }

    public function artist()
    {
        return $this->artist;
    }

    public function name()
    {
        return $this->name;
    }

    public function tracks()
    {
        return $this->tracks;
    }
}
