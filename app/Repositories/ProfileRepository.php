<?php

namespace App\Repositories;

use App\Models\PersonalDetail;
use App\Interfaces\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function findByUserId(int $userId): ?PersonalDetail
    {
        return PersonalDetail::where('user_id', $userId)->first();
    }

    public function updateOrCreate(int $userId, array $data): PersonalDetail
    {
        return PersonalDetail::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
    }
}
