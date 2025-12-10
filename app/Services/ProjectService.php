<?php

namespace App\Services;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\Attachment;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAllProjects(): Collection
    {
        return $this->projectRepository->getAll();
    }

    public function getPaginatedProjects(int $perPage = 10): LengthAwarePaginator
    {
        return $this->projectRepository->getPaginated($perPage);
    }

    public function getProjectById(int $id): ?Project
    {
        return $this->projectRepository->find($id);
    }

    public function createProject(array $data, ?UploadedFile $image = null): Project
    {
        if ($image) {
            $attachment = $this->uploadImage($image);
            $data['attachment_id'] = $attachment->id;
        }

        if (!empty($data['skills_tools']) && is_string($data['skills_tools'])) {
            $data['skills_tools'] = array_map('trim', explode(',', $data['skills_tools']));
        } elseif (empty($data['skills_tools'])) {
            $data['skills_tools'] = [];
        }

        return $this->projectRepository->create($data);
    }

    public function updateProject(Project $project, array $data, ?UploadedFile $image = null, bool $removeImage = false): bool
    {
        if ($removeImage && $project->attachment) {
            $this->deleteAttachment($project->attachment);
            $data['attachment_id'] = null;
        }

        if ($image) {
            // Delete old attachment if exists
            if ($project->attachment) {
                $this->deleteAttachment($project->attachment);
            }

            $attachment = $this->uploadImage($image);
            $data['attachment_id'] = $attachment->id;
        }

        if (isset($data['skills_tools']) && is_string($data['skills_tools'])) {
            $data['skills_tools'] = array_map('trim', explode(',', $data['skills_tools']));
        } elseif (isset($data['skills_tools']) && empty($data['skills_tools'])) {
            $data['skills_tools'] = [];
        }

        return $this->projectRepository->update($project, $data);
    }

    public function deleteProject(Project $project): bool
    {
        if ($project->attachment) {
            $this->deleteAttachment($project->attachment);
        }
        return $this->projectRepository->delete($project);
    }

    protected function uploadImage(UploadedFile $file): Attachment
    {
        $path = $file->store('projects', 'public');
        
        return Attachment::create([
            'original_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);
    }

    protected function deleteAttachment(Attachment $attachment): void
    {
        Storage::disk('public')->delete($attachment->file_path);
        $attachment->delete();
    }
}
