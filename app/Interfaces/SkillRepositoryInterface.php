<?php

namespace App\Interfaces;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SkillRepositoryInterface
{
    public function getAll(): Collection;
    public function getPaginated(int $perPage): LengthAwarePaginator;
    public function find(int $id): ?Skill;
    public function create(array $data): Skill;
    public function update(Skill $skill, array $data): bool;
    public function delete(Skill $skill): bool;
}
