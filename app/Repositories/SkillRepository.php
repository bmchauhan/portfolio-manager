<?php

namespace App\Repositories;

use App\Models\Skill;
use App\Interfaces\SkillRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SkillRepository implements SkillRepositoryInterface
{
    public function getAll(): Collection
    {
        return Skill::orderBy('name', 'asc')->get();
    }

    public function getPaginated(int $perPage): LengthAwarePaginator
    {
        return Skill::orderBy('name', 'asc')->paginate($perPage);
    }

    public function find(int $id): ?Skill
    {
        return Skill::find($id);
    }

    public function create(array $data): Skill
    {
        return Skill::create($data);
    }

    public function update(Skill $skill, array $data): bool
    {
        return $skill->update($data);
    }

    public function delete(Skill $skill): bool
    {
        return $skill->delete();
    }
}
