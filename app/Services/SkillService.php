<?php

namespace App\Services;

use App\Models\Skill;
use App\Interfaces\SkillRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SkillService
{
    protected $skillRepository;

    public function __construct(SkillRepositoryInterface $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function getAllSkills(): Collection
    {
        return $this->skillRepository->getAll();
    }

    public function getPaginatedSkills(int $perPage = 10): LengthAwarePaginator
    {
        return $this->skillRepository->getPaginated($perPage);
    }

    public function createSkill(array $data): Skill
    {
        return $this->skillRepository->create($data);
    }

    public function updateSkill(Skill $skill, array $data): bool
    {
        return $this->skillRepository->update($skill, $data);
    }

    public function deleteSkill(Skill $skill): bool
    {
        return $this->skillRepository->delete($skill);
    }
}
