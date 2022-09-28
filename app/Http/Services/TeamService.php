<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\Team as Model;
use App\Contracts\FileUploadContract as FileUpload;

class          TeamService
{
	/**
     * Create a new class instance.
     *
     * @return void
     */
	public function __construct(
		Model $model,
		FileUpload $fileUpload
	) {
		$this->model = $model;
		$this->fileUpload = $fileUpload;
	}

	/**
	 * Get records from storage
	 *
	 * @return mixed 
	 */
	public function getRecords()
	{
		return $this->model->latest()->get();
	}

	/**
	 * Get records that are visible from storage
	 *
	 * @return mixed 
	 */
	public function getVisibleRecords()
	{
		return $this->model->where('is_visible', true)->get();
	}

	/**
	 * Save record to storage
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed 
	 */
	public function createRecord(Request $request)
	{
		if (isset($request->file) && $request->hasfile('file')) {
			$file = $this->fileUpload->upload(
				$request->file('file'), 
				$this->model->storageFolder()
			);
		}

		DB::beginTransaction();

		$team = $this->model->create($request->all());
		$saved = $team->fill(['image_name' => $file['filename'] ?? NULL])->save();

		DB::commit();

		return $saved;
	}

	/**
	 * Get ONLY one record from storage
	 *
	 * @param  int  $id
	 * @return mixed 
	 */
	public function getOneRecord($id)
	{
		return $this->model->findOrFail($id);
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
		$team = $this->model->find($id);

		if (isset($request->file) && $request->hasfile('file')) {
			$file = $this->fileUpload->update(
				$request->file('file'), 
				$team->image_name,
				$this->model->storageFolder()
			);
		}

		DB::beginTransaction();

		$request['is_visible'] = !isset($request['is_visible']) ? false : true;
		$request['image_name'] = $file['filename'] ?? $team->image_name;

		$updated = $team->update($request->all());

		DB::commit();

		return $updated;
	}

	/** 
 	 * Delete record from storage
 	 *
 	 * @param  int  $id
	 * @return mixed 
	 */
	public function deleteRecord($id)
	{
		$team = $this->model->find($id);

		if (!is_null($team->image_name)) {
			$file = $this->fileUpload->delete($team->image_name, $this->model->storageFolder());	
		}

		return $team->delete();
	}
}