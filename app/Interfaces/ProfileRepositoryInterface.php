<?php

namespace App\Interfaces;

use App\Models\PersonalDetail;

interface ProfileRepositoryInterface
{
    public function findByUserId(int $userId): ?PersonalDetail;
    public function updateOrCreate(int $userId, array $data): PersonalDetail;
}