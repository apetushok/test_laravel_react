<?php

namespace App\Services;

use App\DTO\CsvDTO;
use App\Models\Hotel;
use App\Parsers\Interfaces\CsvParserInterface;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class HotelService
{
    private $csvParser;
    private $eloquentHotelRepository;

    public function __construct(
        CsvParserInterface $csvParser,
        HotelRepositoryInterface $eloquentHotelRepository
    ) {
        $this->csvParser = $csvParser;
        $this->eloquentHotelRepository = $eloquentHotelRepository;
    }

    /**
     * @param string $csvFile
     */
    public function importData(string $csvFile)
    {
        $data = $this->csvParser->getData(new CsvDTO($csvFile));
        DB::transaction(function () use ($data) {
            foreach ($data as $hotelData) {
                $this->eloquentHotelRepository->createOne($hotelData);
            }
        });
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->eloquentHotelRepository->getAll();
    }

    /**
     * @param array $data
     * @return Hotel
     */
    public function create(array $data): Hotel
    {
        return $this->eloquentHotelRepository->createOne($data);
    }

    /**
     * @param int $id
     * @return Hotel
     */
    public function getOne(int $id): Hotel
    {
        return $this->eloquentHotelRepository->getOne($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return (bool)$this->eloquentHotelRepository->updateOne($id, $data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        return (bool)$this->eloquentHotelRepository->deleteOne($id);
    }
}
