<?php 

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\About as Model;
use App\Contracts\FileUploadContract as FileUpload;

class AboutService
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
	 * Get record from storage
	 *
	 * @return mixed 
	 */
	public function getRecord()
	{
		return $this->model->latest()->first();
	}

	/** 
 	 * Create or update record in storage
 	 *
 	 * @param  \Illuminate\Http\Request  $request
 	 * @param  int  $id
	 * @return mixed 
	 */
	public function createOrUpdateRecord($request, $id)
	{
		$about = $this->model->find($id);

		if (! is_null($about)) {
			if (isset($request->primary_image) && $request->hasfile('primary_image')) {
				$primaryImage = $this->fileUpload->update(
					$request->file('primary_image'), 
					$about->primary_img_name,
					$this->model->storageFolder()
				);
			}

			if (isset($request->secondary_image) && $request->hasfile('secondary_image')) {
				$secondaryImage = $this->fileUpload->update(
					$request->file('secondary_image'), 
					$about->secondary_img_name,
					$this->model->storageFolder()
				);
			}

			return $about->update([
				'brief' => $request->brief,
				'primary_img_name' => $primaryImage['filename'] ?? $about->primary_img_name,
				'secondary_img_name' => $secondaryImage['filename'] ?? $about->secondary_img_name,
				'quote' => $request->quote,
				'quote_author' => $request->quote_author
			]);

		}

		if (isset($request->primary_image) && $request->hasfile('primary_image')) {
			$primaryImage = $this->fileUpload->upload(
				$request->file('primary_image'), 
				$this->model->storageFolder()
			);
		}

		if (isset($request->secondary_image) && $request->hasfile('secondary_image')) {
			$secondaryImage = $this->fileUpload->upload(
				$request->file('secondary_image'), 
				$this->model->storageFolder()
			);
		}

		return $this->model->create([
			'brief' => $request->brief,
			'primary_img_name' => $primaryImage['filename'] ?? NULL,
			'secondary_img_name' => $secondaryImage['filename'] ?? NULL,
			'quote' => $request->quote,
			'quote_author' => $request->quote_author
		]);
	}

}