<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\Slider as Model;
use App\Contracts\FileUploadContract as FileUpload;

class SliderService
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
		return $this->model->where('is_visible', true)->orderBy('order_number', 'ASC')->get();
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

		$slider = $this->model->create($request->all());
		$saved = $slider->fill(['file_name' => $file['filename'] ?? NULL])->save();

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
		$slider = $this->model->find($id);

		if (isset($request->file) && $request->hasfile('file')) {
			$file = $this->fileUpload->update(
				$request->file('file'), 
				$slider->file_name,
				$this->model->storageFolder()
			);
		}

		DB::beginTransaction();

		$request['is_visible'] = !isset($request['is_visible']) ? false : true;
		$request['file_name'] = $file['filename'] ?? $slider->file_name;

		$updated = $slider->update($request->all());

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
		$slider = $this->model->find($id);

		if (!is_null($slider->file_name)) {
			$file = $this->fileUpload->delete($slider->file_name, $this->model->storageFolder());	
		}
		
		return $slider->delete();
	}
}