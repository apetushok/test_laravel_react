<?php

namespace App\Repositories;

use App\Models\Hotel;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentHotelRepository implements HotelRepositoryInterface
{
    public function getAll(): Collection
    {
        return Hotel::all()->makeHidden('description');
    }

    public function getOne(int $id): ?Hotel
    {
        return Hotel::find($id);
    }

    public function createOne(array $data): Hotel
    {
        return Hotel::create($data);
    }

    public function updateOne(int $id, array $data): bool
    {
        return (bool) Hotel::where('id', $id)->update($data);
    }

    public function deleteOne(int $id): bool
    {
        return (bool) Hotel::where('id', $id)->delete();
    }
}
