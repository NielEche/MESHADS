<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\Breadcrumb as Model;
use App\Contracts\FileUploadContract as FileUpload;

class BreadcrumbService
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

		$breadcrumb = $this->model->create([
			'title' => $request->title,
			'slug' => $request->title,
			'menu_slug' => $request->menu,
		]);

		$saved = $breadcrumb->fill(['image_name' => $file['filename'] ?? NULL])->save();

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
		$breadcrumb = $this->model->find($id);

		if (isset($request->file) && $request->hasfile('file')) {
			$file = $this->fileUpload->update(
				$request->file('file'), 
				$breadcrumb->image_name,
				$this->model->storageFolder()
			);
		}

		DB::beginTransaction();

		$updated = $breadcrumb->update([
			'title' => $request->title,
			'slug' => $request->title,
			'menu_slug' => $request->menu,
			'image_name' => $file['filename'] ?? $breadcrumb->image_name,
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
		$breadcrumb = $this->model->find($id);

		if (!is_null($breadcrumb->image_name)) {
			$file = $this->fileUpload->delete($breadcrumb->image_name, $this->model->storageFolder());	
		}

		return $breadcrumb->delete();
	}
}