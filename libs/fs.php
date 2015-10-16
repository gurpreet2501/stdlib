<?php 

final class fs
{
    static public function read($path)
    {
        return file_exists($path) ? unlink($path) : False;

    }
    static public function delete($path)
    {
        return file_exists($path) ? unlink($path) : False;

    }

} 