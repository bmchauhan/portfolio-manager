<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProjectService;
use App\Services\SkillService;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;

class ProjectController extends Controller
{
    protected $projectService;
    protected $skillService;

    public function __construct(ProjectService $projectService, SkillService $skillService)
    {
        $this->projectService = $projectService;
        $this->skillService = $skillService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectService->getPaginatedProjects(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = $this->skillService->getAllSkills();
        return view('admin.projects.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $this->projectService->createProject($request->validated(), $request->file('image'));
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $skills = $this->skillService->getAllSkills();
        return view('admin.projects.edit', compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->updateProject(
            $project, 
            $request->validated(), 
            $request->file('image'), 
            $request->boolean('remove_image')
        );

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->projectService->deleteProject($project);
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
