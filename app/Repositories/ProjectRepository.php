<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAll(): Collection
    {
        return Project::with('attachment')->latest()->get();
    }

    public function getPaginated(int $perPage): LengthAwarePaginator
    {
        return Project::with('attachment')->latest()->paginate($perPage);
    }

    public function find(int $id): ?Project
    {
        return Project::with('attachment')->find($id);
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): bool
    {
        return $project->update($data);
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
