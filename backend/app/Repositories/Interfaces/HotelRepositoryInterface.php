<?php

namespace App\Repositories\Interfaces;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;

interface HotelRepositoryInterface
{
    public function getAll(): Collection;
    public function getOne(int $id): ?Hotel;
    public function createOne(array $data): Hotel;
    public function updateOne(int $id, array $data): bool;
    public function deleteOne(int $id): bool;
}
