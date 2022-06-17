<?php

namespace App\Services\Libs;
use App\Services\Interfaces\IReadLogFile;

class ReadLogFile implements IReadLogFile {
    /**
     * @param $path
     * @return array
     */
    public static function readLogFileLines($path) :array
    {
        $rows = [];
        if (file_exists($path)) {
            $fileHandle = fopen($path, 'rb');
            while(!feof($fileHandle)) {
                $line = fgets($fileHandle);
                $rows[]=$line;
            }
        } else {
            echo json_encode(array('status' => 'failed', 'msg' => "Error: The file does not exist."),
                JSON_THROW_ON_ERROR );
            exit;
        }
        fclose($fileHandle);
        return $rows;
    }
}
