<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ProjectService;
use App\Http\Services\ServicesProvidedService;

class ServicesProvidedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
		ProjectService $projectService,
		ServicesProvidedService $servicesProvidedService
	) {
		$this->projectService = $projectService;
        $this->servicesProvidedService = $servicesProvidedService;
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
        $services = $this->servicesProvidedService->getRecords($projectId);

        return view('admin.services.index', compact('services', 'project'));
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
		$request->validate(['title' => 'required']);

		// Confirm the project id is valid
		$this->projectService->getOneRecord($projectId);

        $service = $this->servicesProvidedService->createRecord($request);

		if (! $service) {
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
		$request->validate(['title' => 'required']);

		// Confirm the project id is valid
		$this->projectService->getOneRecord($projectId);

		$service = $this->servicesProvidedService->updateRecord($id, $request);

		if (! $service) {
			return redirect()->route('admin.projects.services.index', $projectId)
							->with('error_msg', 'Failed to edit!');
		}
        
        return redirect()->route('admin.projects.services.index', $projectId)
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
        $this->servicesProvidedService->deleteRecord($id);
        return redirect()->back()->with('success_msg', 'Deleted successfully!');
    }
}
