<?php

namespace App\Interfaces;

use App\Models\Education;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EducationRepositoryInterface
{
    public function getAll(): Collection;
    public function getPaginated(int $perPage): LengthAwarePaginator;
    public function find(int $id): ?Education;
    public function create(array $data): Education;
    public function update(Education $education, array $data): bool;
    public function delete(Education $education): bool;
}
