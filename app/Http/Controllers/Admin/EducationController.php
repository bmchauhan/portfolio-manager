<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Services\EducationService;
use App\Http\Requests\Admin\StoreEducationRequest;
use App\Http\Requests\Admin\UpdateEducationRequest;
use App\Constants\MessageConstants;

class EducationController extends Controller
{
    protected $educationService;

    public function __construct(EducationService $educationService)
    {
        $this->educationService = $educationService;
    }

    public function index()
    {
        $educations = $this->educationService->getPaginatedEducations(10);
        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(StoreEducationRequest $request)
    {
        $this->educationService->createEducation($request->all());
        return redirect()->route('admin.educations.index')->with(MessageConstants::SUCCESS, MessageConstants::CREATED_SUCCESSFULLY);
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $this->educationService->updateEducation($education, $request->all());
        return redirect()->route('admin.educations.index')->with(MessageConstants::SUCCESS, MessageConstants::UPDATED_SUCCESSFULLY);
    }

    public function destroy(Education $education)
    {
        $this->educationService->deleteEducation($education);
        return redirect()->route('admin.educations.index')->with(MessageConstants::SUCCESS, MessageConstants::DELETED_SUCCESSFULLY);
    }
}
