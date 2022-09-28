<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\ProjectImage as Model;
use App\Contracts\FileUploadContract as FileUpload;

class ProjectImageService
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
	 * Save record to storage
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed 
	 */
	public function createRecord(Request $request)
	{


		if($request->file != null){
           
            $file = cloudinary()->upload($request->file->getRealPath())->getSecurePath();

        }else{
            $file = '';
        }


		DB::beginTransaction();

		$image = $this->model->create($request->all());
		$saved = $image->fill(['image_name' => $file ?? NULL])->save();

		
		DB::commit();

		return $saved;

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
		$image = $this->model->find($id);


		if($request->file != null){
			$file = cloudinary()->upload($request->file->getRealPath())->getSecurePath();

			$image->image_name = $file;
		}else{
			$image->save();
		}


		DB::beginTransaction();

		$request['is_visible'] = !isset($request['is_visible']) ? false : true;
		$request['image_name'] = $image->image_name;

	
		$updated = $image->update($request->all());

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
		$projectImage = $this->model->find($id);

		if (!is_null($projectImage->image_name)) {
			$file = $this->fileUpload->delete($projectImage->image_name, $this->model->storageFolder());	
		}

		return $projectImage->delete();
	}
}