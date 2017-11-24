<?php

namespace Album;

class PlaylistTrack extends Track
{
    private $album;

    public function __construct(string $title, Duration $duration, Album $album)
    {
        parent::__construct($title, $duration);
        $this->album = $album;
    }

    public function album()
    {
        return $this->album;
    }
}
