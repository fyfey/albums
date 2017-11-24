<?php

namespace Album;

class FileLoader
{
    public static function load($filename)
    {
        return file($filename);
    }
}
