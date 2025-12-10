<?php

namespace App\Interfaces;

use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProjectRepositoryInterface
{
    public function getAll(): Collection;
    public function getPaginated(int $perPage): LengthAwarePaginator;
    public function find(int $id): ?Project;
    public function create(array $data): Project;
    public function update(Project $project, array $data): bool;
    public function delete(Project $project): bool;
}
