<?php

namespace Album;

class AlbumCollection
{
    public function __construct(array $albums)
    {
        foreach ($data as $row) {
            if (!$this->isTrack($row)) {
                $album = new Album($row);
                $this->add($album);
            }
            $album->addTrack(new Track($row));
        }
    }

    public function add(Album $album)
    {
        return $this;
    }
}
