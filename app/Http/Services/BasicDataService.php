<?php 

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\BasicData as Model;
use App\Contracts\FileUploadContract as FileUpload;

class BasicDataService
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
		$data = $this->model->find($id);

		if (! is_null($data)) {
			if (isset($request->logo) && $request->hasfile('logo')) {
				$logo = $this->fileUpload->update(
					$request->file('logo'), 
					$data->logo_name,
					$this->model->storageFolder()
				);
			}

			if (isset($request->logo_white) && $request->hasfile('logo_white')) {
				$logoWhite = $this->fileUpload->update(
					$request->file('logo_white'), 
					$data->logo_white_name,
					$this->model->storageFolder()
				);
			}

			if (isset($request->brochure) && $request->hasfile('brochure')) {
				$brochure = $this->fileUpload->update(
					$request->file('brochure'), 
					$data->brochure_name,
					$this->model->storageFolder()
				);
			}

			return $data->update([
				'short_name' => $request->short_name,
				'full_name' => $request->full_name,
				'logo_name' => $logo['filename'] ?? $data->logo_name,
				'logo_white_name' => $logoWhite['filename'] ?? $data->logo_white_name,
				'brochure_name' => $brochure['filename'] ?? $data->brochure_name,
			]);

		}

		if (isset($request->logo) && $request->hasfile('logo')) {
			$logo = $this->fileUpload->upload(
				$request->file('logo'), 
				$this->model->storageFolder()
			);
		}

		if (isset($request->logo_white) && $request->hasfile('logo_white')) {
			$logoWhite = $this->fileUpload->upload(
				$request->file('logo_white'), 
				$this->model->storageFolder()
			);
		}

		if (isset($request->brochure) && $request->hasfile('brochure')) {
			$brochure = $this->fileUpload->upload(
				$request->file('brochure'), 
				$this->model->storageFolder()
			);
		}

		return $this->model->create([
			'short_name' => $request->short_name,
			'full_name' => $request->full_name,
			'logo_name' => $logo['filename'] ?? NULL,
			'logo_white_name' => $logoWhite['filename'] ?? NULL,
			'brochure_name' => $brochure['filename'] ?? NULL,
		]);
	}

}