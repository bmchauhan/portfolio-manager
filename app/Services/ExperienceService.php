<?php

namespace App\Services;

use App\Models\Experience;
use App\Interfaces\ExperienceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ExperienceService
{
    protected $experienceRepository;

    public function __construct(ExperienceRepositoryInterface $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function getAllExperiences(): Collection
    {
        return $this->experienceRepository->getAll();
    }

    public function getPaginatedExperiences(int $perPage = 10): LengthAwarePaginator
    {
        return $this->experienceRepository->getPaginated($perPage);
    }

    public function createExperience(array $data): Experience
    {
        // Handle boolean conversion for checkbox
        $data['is_current'] = isset($data['is_current']);
        
        $experience = $this->experienceRepository->create($data);

        if (isset($data['skills'])) {
            $experience->skills()->sync($data['skills']);
        }
        
        return $experience;
    }

    public function updateExperience(Experience $experience, array $data): bool
    {
        // Handle boolean conversion for checkbox
        $data['is_current'] = isset($data['is_current']);
        
        $updated = $this->experienceRepository->update($experience, $data);

        if (array_key_exists('skills', $data)) {
            $experience->skills()->sync($data['skills']);
        }
        
        return $updated;
    }

    public function deleteExperience(Experience $experience): bool
    {
        return $this->experienceRepository->delete($experience);
    }
}
