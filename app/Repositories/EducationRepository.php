<?php

namespace App\Repositories;

use App\Models\Education;
use App\Interfaces\EducationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EducationRepository implements EducationRepositoryInterface
{
    public function getAll(): Collection
    {
        return Education::orderBy('start_date', 'desc')->get();
    }

    public function getPaginated(int $perPage): LengthAwarePaginator
    {
        return Education::orderBy('start_date', 'desc')->paginate($perPage);
    }

    public function find(int $id): ?Education
    {
        return Education::find($id);
    }

    public function create(array $data): Education
    {
        return Education::create($data);
    }

    public function update(Education $education, array $data): bool
    {
        return $education->update($data);
    }

    public function delete(Education $education): bool
    {
        return $education->delete();
    }
}
