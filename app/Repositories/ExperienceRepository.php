<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Interfaces\ExperienceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ExperienceRepository implements ExperienceRepositoryInterface
{
    public function getAll(): Collection
    {
        return Experience::orderBy('start_date', 'desc')->get();
    }

    public function getPaginated(int $perPage): LengthAwarePaginator
    {
        return Experience::orderBy('start_date', 'desc')->paginate($perPage);
    }

    public function find(int $id): ?Experience
    {
        return Experience::find($id);
    }

    public function create(array $data): Experience
    {
        return Experience::create($data);
    }

    public function update(Experience $experience, array $data): bool
    {
        return $experience->update($data);
    }

    public function delete(Experience $experience): bool
    {
        return $experience->delete();
    }
}
