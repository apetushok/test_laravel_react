<?php


namespace App\DTO;

class CsvDTO
{
    public string $filePath;
    public string $separator;

    public function __construct(string $filePath, string $separator = ';')
    {
        $this->filePath = $filePath;
        $this->separator = $separator;
    }
}
