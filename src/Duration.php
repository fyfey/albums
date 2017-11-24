<?php

namespace Album;

class Duration
{
    private $hours;
    private $minutes;
    private $seconds;

    public function __construct(int $hours, int $minutes, int $seconds)
    {
        $this->hours   = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    public static function fromString(string $string): Duration
    {
        preg_match('/(\d*):(\d*):(\d*)/', $string, $parts);

        return new static($parts[1], $parts[2], $parts[3]);
    }

    public static function fromTimestamp(int $timestamp)
    {
        $hours   = floor($timestamp / 3600);
        $minutes = floor($timestamp % 3600 / 60);
        $seconds = $timestamp % 60;

        return new static($hours, $minutes, $seconds);
    }

    public function add(self $duration)
    {
        return static::fromTimestamp($this->timestamp() + $duration->timestamp());
    }

    public function timestamp()
    {
        return $this->hours() * 60 * 60 + $this->minutes() * 60 + $this->seconds();
    }

    public function hours()
    {
        return $this->hours;
    }

    public function minutes()
    {
        return $this->minutes;
    }

    public function seconds()
    {
        return $this->seconds;
    }

    public function __toString()
    {
        return sprintf('%d:%02d:%02d', $this->hours(), $this->minutes(), $this->seconds());
    }
}
