<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProjectService;
use App\Http\Requests\ProjectRequest;
use App\Http\Services\CategoryService;

class ProjectController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
		ProjectService $projectService,
		CategoryService $categoryService
	) {
        $this->projectService = $projectService;
		$this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->projectService->getRecords();
		
		$categories = $this->categoryService->getVisibleRecords();

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = $this->projectService->createRecord($request);

		if (! $project) {
			return redirect()->back()->with('error_msg', 'Failed to save!');
		}

        return redirect()->back()->with('success_msg', 'Done successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$project = $this->projectService->updateRecord($id, $request);

		if (! $project) {
			return redirect()->route('admin.projects.index')->with('error_msg', 'Failed to update project!');
		}
        
        return redirect()->route('admin.projects.index')->with('success_msg', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->projectService->deleteRecord($id);
        return redirect()->back()->with('success_msg', 'Deleted successfully!');
    }
}
