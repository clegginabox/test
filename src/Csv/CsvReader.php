<?php

namespace App\Csv;

use SplFileObject;
use Ddeboer\DataImport\Reader\CsvReader as Reader;
use Symfony\Component\Validator\Exception\InvalidArgumentException;

class CsvReader
{
    public static function build(string $filename)
    {
        if (file_exists($filename)) {
            return new Reader(
                new SplFileObject($filename)
            );
        }

        throw new InvalidArgumentException('File does not exist');
    }
}