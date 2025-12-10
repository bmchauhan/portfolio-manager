<?php

namespace App\Services;

use App\Interfaces\LanguageRepositoryInterface;
use App\Models\Language;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class LanguageService
{
    protected $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function getAllLanguages(): Collection
    {
        return $this->languageRepository->getAll();
    }

    public function getPaginatedLanguages(int $perPage = 10): LengthAwarePaginator
    {
        return $this->languageRepository->getPaginated($perPage);
    }

    public function getLanguageById(int $id): ?Language
    {
        return $this->languageRepository->find($id);
    }

    public function createLanguage(array $data): Language
    {
        return $this->languageRepository->create($data);
    }

    public function updateLanguage(Language $language, array $data): bool
    {
        return $this->languageRepository->update($language, $data);
    }

    public function deleteLanguage(Language $language): bool
    {
        return $this->languageRepository->delete($language);
    }
}
