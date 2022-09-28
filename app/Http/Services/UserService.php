<?php 

namespace App\Http\Services;

use DB;
use App\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\FileUploadContract as FileUpload;

class UserService
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

		$saved = $this->model->create([
			'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
			'image_name' => $file['filename'] ?? NULL,
			'is_active' => !isset($request->is_visible) ? false : true,
		]);
		
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
		$user = $this->model->find($id);

		if (isset($request->file) && $request->hasfile('file')) {
			$file = $this->fileUpload->update(
				$request->file('file'), 
				$user->image_name,
				$this->model->storageFolder()
			);
		}
		
		DB::beginTransaction();

		$updated = $user->update([
			'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
			'image_name' => $file['filename'] ?? $user->image_name,
			'is_active' => !isset($request->is_visible) ? false : true,
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
		$user = $this->model->find($id);

		if (!is_null($user->image_name)) {
			$file = $this->fileUpload->delete($user->image_name, $this->model->storageFolder());	
		}

		return $user->delete();
	}
}