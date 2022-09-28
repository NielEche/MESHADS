<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProjectService;
use App\Http\Requests\ProjectImageRequest;
use App\Http\Services\ProjectImageService;

class ProjectImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
		ProjectService $projectService,
		ProjectImageService $projectImageService
	) {
		$this->projectService = $projectService;
        $this->projectImageService = $projectImageService;
    }

	/**
     * Display a listing of the resource.
     *
	 * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function index($projectId)
    {
		$project = $this->projectService->getOneRecord($projectId);
        $images = $this->projectImageService->getRecords($projectId);

		$tags = $this->tags();

        return view('admin.project-images.index', compact('images', 'project', 'tags'));
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectImageRequest  $request
	 * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectImageRequest $request, $projectId)
    {
		// Confirm the project id is valid
		$this->projectService->getOneRecord($projectId);

        $images = $this->projectImageService->createRecord($request);

		if (! $images) {
			return redirect()->back()->with('error_msg', 'Failed to save!');
		}

        return redirect()->back()->with('success_msg', 'Done successfully!');
    }

	/**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProjectImageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectImageRequest $request, $id, $projectId)
    {
		// Confirm the project id is valid
		$this->projectService->getOneRecord($projectId);

		$images = $this->projectImageService->updateRecord($id, $request);

		if (! $images) {
			return redirect()->route('admin.projects.images.index', $projectId)
							->with('error_msg', 'Failed to edit!');
		}
        
        return redirect()->route('admin.projects.images.index', $projectId)
						->with('success_msg', 'Updated successfully!');
    }

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->projectImageService->deleteRecord($id);
        return redirect()->back()->with('success_msg', 'Deleted successfully!');
    }

	/** 
	 * Tags related to project image
	 * 
	 * @return array
	 */
	public function tags()
	{
		return [
			'print' => 'Print',
			'web' => 'Web',
			'mobile' => 'Mobile',
		];
	}
}
