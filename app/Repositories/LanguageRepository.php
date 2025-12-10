<?php

namespace App\Repositories;

use App\Interfaces\LanguageRepositoryInterface;
use App\Models\Language;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class LanguageRepository implements LanguageRepositoryInterface
{
    public function getAll(): Collection
    {
        return Language::all();
    }

    public function getPaginated(int $perPage): LengthAwarePaginator
    {
        return Language::orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function find(int $id): ?Language
    {
        return Language::find($id);
    }

    public function create(array $data): Language
    {
        return Language::create($data);
    }

    public function update(Language $language, array $data): bool
    {
        return $language->update($data);
    }

    public function delete(Language $language): bool
    {
        return $language->delete();
    }
}
