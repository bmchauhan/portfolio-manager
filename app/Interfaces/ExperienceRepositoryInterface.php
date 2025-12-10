<?php

namespace App\Interfaces;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ExperienceRepositoryInterface
{
    public function getAll(): Collection;
    public function getPaginated(int $perPage): LengthAwarePaginator;
    public function find(int $id): ?Experience;
    public function create(array $data): Experience;
    public function update(Experience $experience, array $data): bool;
    public function delete(Experience $experience): bool;
}
