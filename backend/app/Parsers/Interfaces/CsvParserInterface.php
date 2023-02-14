<?php


namespace App\Parsers\Interfaces;

use App\DTO\CsvDTO;
use Iterator;

interface CsvParserInterface
{
    public function getData(CsvDTO $csvDTO): Iterator;
}
