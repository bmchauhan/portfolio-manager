<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Services\SkillService;
use App\Http\Requests\Admin\StoreSkillRequest;
use App\Http\Requests\Admin\UpdateSkillRequest;
use App\Constants\MessageConstants;

class SkillController extends Controller
{
    protected $skillService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    public function index()
    {
        $skills = $this->skillService->getPaginatedSkills(10);
        return view('admin.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(StoreSkillRequest $request)
    {
        $this->skillService->createSkill($request->all());
        return redirect()->route('admin.skills.index')->with(MessageConstants::SUCCESS, MessageConstants::CREATED_SUCCESSFULLY);
    }

    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $this->skillService->updateSkill($skill, $request->all());
        return redirect()->route('admin.skills.index')->with(MessageConstants::SUCCESS, MessageConstants::UPDATED_SUCCESSFULLY);
    }

    public function destroy(Skill $skill)
    {
        $this->skillService->deleteSkill($skill);
        return redirect()->route('admin.skills.index')->with(MessageConstants::SUCCESS, MessageConstants::DELETED_SUCCESSFULLY);
    }
}
