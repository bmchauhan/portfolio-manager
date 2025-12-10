<?php

namespace App\Services;

use App\Models\PersonalDetail;
use App\Models\Attachment;
use App\Interfaces\ProfileRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getProfile(int $userId): ?PersonalDetail
    {
        return $this->profileRepository->findByUserId($userId);
    }

    public function updateProfile(int $userId, array $data, ?UploadedFile $resume = null, ?UploadedFile $avatar = null): PersonalDetail
    {
        $profile = $this->getProfile($userId);

        // Handle Resume Upload
        if ($resume) {
            // Delete old resume if exists
            if ($profile && $profile->resume_id) {
                $this->deleteAttachment($profile->resume_id);
            }
            
            $path = $resume->store('resumes', 'public');
            $attachment = Attachment::create([
                'original_name' => $resume->getClientOriginalName(),
                'file_path' => $path,
                'mime_type' => $resume->getMimeType(),
                'file_size' => $resume->getSize(),
            ]);
            $data['resume_id'] = $attachment->id;
        }

        // Handle Avatar Upload
        if ($avatar) {
             // Delete old avatar if exists
            if ($profile && $profile->avatar_id) {
                $this->deleteAttachment($profile->avatar_id);
            }

            $path = $avatar->store('avatars', 'public');
            $attachment = Attachment::create([
                'original_name' => $avatar->getClientOriginalName(),
                'file_path' => $path,
                'mime_type' => $avatar->getMimeType(),
                'file_size' => $avatar->getSize(),
            ]);
            $data['avatar_id'] = $attachment->id;
        }

        return $this->profileRepository->updateOrCreate($userId, $data);
    }

    public function deleteResume(int $userId): void
    {
        $profile = $this->getProfile($userId);
        if ($profile && $profile->resume_id) {
            $this->deleteAttachment($profile->resume_id);
            $this->profileRepository->updateOrCreate($userId, ['resume_id' => null]);
        }
    }

    public function deleteAvatar(int $userId): void
    {
        $profile = $this->getProfile($userId);
        if ($profile && $profile->avatar_id) {
            $this->deleteAttachment($profile->avatar_id);
            $this->profileRepository->updateOrCreate($userId, ['avatar_id' => null]);
        }
    }

    protected function deleteAttachment($attachmentId)
    {
        $attachment = Attachment::find($attachmentId);
        if ($attachment) {
            Storage::disk('public')->delete($attachment->file_path);
            $attachment->delete();
        }
    }
}
