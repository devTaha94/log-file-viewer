<?php

namespace App\Services\Interfaces;

interface IReadLogFile{
    /**
     * @param $path
     * @return array
     */
    public static function readLogFileLines($path):array;
}
