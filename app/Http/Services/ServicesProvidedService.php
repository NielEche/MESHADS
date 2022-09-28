<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\ServicesProvided as Model;

class ServicesProvidedService
{
	/**
     * Create a new class instance.
     *
     * @return void
     */
	public function __construct(Model $model) 
	{
		$this->model = $model;
	}

	/**
	 * Get records from storage
	 *
	 * @param  int  $projectId
	 * @return mixed 
	 */
	public function getRecords($projectId)
	{
		return $this->model->where('project_id', $projectId)
					->latest()
					->with(['project'])
					->get();
	}

	/**
	 * Get records that are visible from storage
	 *
	 * @return mixed 
	 */
	/* public function getVisibleRecords()
	{
		return $this->model->where('is_visible', true)->orderBy('order_number', 'ASC')->get();
	} */

	/**
	 * Save record to storage
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed 
	 */
	public function createRecord(Request $request)
	{
		DB::beginTransaction();
		$service = $this->model->create([
			'title' => $request->title,
			'slug' => $request->title,
			'is_visible' => $request->is_visible,
			'project_id' => $request->project_id,
		]);
		DB::commit();

		return $service;

	}

	/** 
 	 * Update record in storage
 	 *
 	 * @param  int  $id
 	 * @param  \Illuminate\Http\Request  $request
	 * @return boolean 
	 */
	public function updateRecord($id, Request $request)
	{
		$service = $this->model->find($id);

		DB::beginTransaction();

		$isVisible = !isset($request->is_visible) ? false : true;

		$updated = $service->update([
			'title' => $request->title,
			'slug' => $request->title,
			'is_visible' => $isVisible,
			'project_id' => $request->project_id,
		]);

		DB::commit();

		return $updated;
	}

	/** 
 	 * Delete record from storage
 	 *
 	 * @param  int  $id
	 * @return boolean 
	 */
	public function deleteRecord($id)
	{
		return $this->model->find($id)->delete();
	}
}