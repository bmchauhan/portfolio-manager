<?php

namespace App\Services;

use App\Models\Education;
use App\Interfaces\EducationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EducationService
{
    protected $educationRepository;

    public function __construct(EducationRepositoryInterface $educationRepository)
    {
        $this->educationRepository = $educationRepository;
    }

    public function getAllEducations(): Collection
    {
        return $this->educationRepository->getAll();
    }

    public function getPaginatedEducations(int $perPage = 10): LengthAwarePaginator
    {
        return $this->educationRepository->getPaginated($perPage);
    }

    public function createEducation(array $data): Education
    {
        // Handle boolean conversion for checkbox
        $data['is_current'] = isset($data['is_current']);
        
        return $this->educationRepository->create($data);
    }

    public function updateEducation(Education $education, array $data): bool
    {
        // Handle boolean conversion for checkbox
        $data['is_current'] = isset($data['is_current']);
        
        return $this->educationRepository->update($education, $data);
    }

    public function deleteEducation(Education $education): bool
    {
        return $this->educationRepository->delete($education);
    }
}
