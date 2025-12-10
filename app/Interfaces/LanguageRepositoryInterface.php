<?php

namespace App\Interfaces;

use App\Models\Language;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface LanguageRepositoryInterface
{
    public function getAll(): Collection;
    public function getPaginated(int $perPage): LengthAwarePaginator;
    public function find(int $id): ?Language;
    public function create(array $data): Language;
    public function update(Language $language, array $data): bool;
    public function delete(Language $language): bool;
}
