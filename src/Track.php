<?php

namespace Album;

class Track
{
    private $title;
    private $duration;

    public function __construct(string $title, Duration $duration)
    {
        $this->title = $title;
        $this->duration = $duration;
    }

    public static function fromString($string)
    {
        preg_match('/(\d*:\d{1,2}:\d{1,2}) - (.+)/', $string, $parts);

        $track = new static($parts[2], Duration::fromString($parts[1]));

        return $track;
    }

    public function duration(): Duration
    {
        return $this->duration;
    }

    public function title()
    {
        return $this->title;
    }
}
