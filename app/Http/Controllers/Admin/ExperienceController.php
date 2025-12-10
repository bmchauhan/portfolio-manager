<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Services\ExperienceService;
use App\Services\SkillService;
use App\Http\Requests\Admin\StoreExperienceRequest;
use App\Http\Requests\Admin\UpdateExperienceRequest;
use App\Constants\MessageConstants;

class ExperienceController extends Controller
{
    protected $experienceService;
    protected $skillService;

    public function __construct(ExperienceService $experienceService, SkillService $skillService)
    {
        $this->experienceService = $experienceService;
        $this->skillService = $skillService;
    }

    public function index()
    {
        $experiences = $this->experienceService->getPaginatedExperiences(10);
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        $skills = $this->skillService->getAllSkills();
        return view('admin.experience.create', compact('skills'));
    }

    public function store(StoreExperienceRequest $request)
    {
        $this->experienceService->createExperience($request->all());
        return redirect()->route('admin.experiences.index')->with(MessageConstants::SUCCESS, MessageConstants::CREATED_SUCCESSFULLY);
    }

    public function edit(Experience $experience)
    {
        $skills = $this->skillService->getAllSkills();
        return view('admin.experience.edit', compact('experience', 'skills'));
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $this->experienceService->updateExperience($experience, $request->all());
        return redirect()->route('admin.experiences.index')->with(MessageConstants::SUCCESS, MessageConstants::UPDATED_SUCCESSFULLY);
    }

    public function destroy(Experience $experience)
    {
        $this->experienceService->deleteExperience($experience);
        return redirect()->route('admin.experiences.index')->with(MessageConstants::SUCCESS, MessageConstants::DELETED_SUCCESSFULLY);
    }
}
