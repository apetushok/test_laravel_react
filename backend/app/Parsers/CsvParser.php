<?php

namespace App\Parsers;

use App\DTO\CsvDTO;
use App\Exceptions\FileDoesNotExistException;
use App\Exceptions\InvalidArgumentException;
use App\Parsers\Interfaces\CsvParserInterface;
use Iterator;

class CsvParser implements CsvParserInterface
{
    /**
     * @param CsvDTO $csvDTO
     * @return Iterator
     * @throws FileDoesNotExistException
     */
    public function getData(CsvDTO $csvDTO): Iterator
    {
        if (!file_exists($csvDTO->filePath)
            || (($handle = fopen($csvDTO->filePath, "r")) === false)) {
            throw new FileDoesNotExistException('File does not exist');
        }

        return $this->generateData(
            $handle,
            $this->getColumns($handle, $csvDTO->separator),
            $csvDTO->separator
        );
    }

    /**
     * @param $handle
     * @param string $separator
     * @return array|string[]
     */
    protected function getColumns($handle, string $separator)
    {
        return array_map(function ($item) {
            return $item === 'Hotel Name' ? 'name' : strtolower($item);
        }, fgetcsv($handle, null, $separator));
    }

    /**
     * @param $handle
     * @param array $columns
     * @param string $separator
     * @return Iterator
     * @throws InvalidArgumentException
     */
    protected function generateData($handle, array $columns, string $separator): Iterator
    {
        if (false === is_resource($handle)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Argument must be a valid resource type. %s given.',
                    gettype($handle)
                )
            );
        }

        while (($data = fgetcsv($handle, null, $separator)) !== false) {
            yield array_combine($columns, $data);
        }

        fclose($handle);
    }
}
