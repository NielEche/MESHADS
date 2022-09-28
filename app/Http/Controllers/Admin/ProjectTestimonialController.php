<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProjectService;
use App\Http\Services\ProjectTestimonialService;

class ProjectTestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
		ProjectService $projectService,
		ProjectTestimonialService $projectTestimonialService
	) {
		$this->projectService = $projectService;
        $this->projectTestimonialService = $projectTestimonialService;
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
        $testimonials = $this->projectTestimonialService->getRecords($projectId);

        return view('admin.testimonials.index', compact('testimonials', 'project'));
    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $projectId)
    {
		$request->validate([
			'testimonial' => 'required',
			'author' => 'required'
		]);

		// Confirm the project id is valid
		$this->projectService->getOneRecord($projectId);

        $testimonials = $this->projectTestimonialService->createRecord($request);

		if (! $testimonials) {
			return redirect()->back()->with('error_msg', 'Failed to save!');
		}

        return redirect()->back()->with('success_msg', 'Done successfully!');
    }

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $projectId)
    {
		$request->validate([
			'testimonial' => 'required',
			'author' => 'required'
		]);

		// Confirm the project id is valid
		$this->projectService->getOneRecord($projectId);

		$testimonials = $this->projectTestimonialService->updateRecord($id, $request);

		if (! $testimonials) {
			return redirect()->route('admin.projects.testimonials.index', $projectId)
							->with('error_msg', 'Failed to edit!');
		}
        
        return redirect()->route('admin.projects.testimonials.index', $projectId)
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
        $this->projectTestimonialService->deleteRecord($id);
        return redirect()->back()->with('success_msg', 'Deleted successfully!');
    }
}
