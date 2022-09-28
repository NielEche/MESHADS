<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\Project as Model;
use App\Contracts\FileUploadContract as FileUpload;

class ProjectService
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
	 * Get the next record after the currect record
	 *
	 * @param  int  $id
	 * @return mixed 
	 */
	public function getNext($id)
	{
		return $this->model->where('id', '>', $id)
					->where('is_visible', true)
					->orderBy('id')
					->first();
	}

	/**
	 * Get the next record after the currect record
	 *
	 * @param  int  $id
	 * @return mixed 
	 */
	public function getPrevious($id)
	{
		return $this->model->where('id', '<', $id)
					->where('is_visible', true)
					->orderBy('id', 'DESC')
					->first();
	}

		/**
	 * Get records that are visible from storage
	 *
	 * @return mixed 
	 */
	public function getVisibleRecords()
	{
		return $this->model->where('is_visible', true)
					->with(['category:id,name,slug'])	
					->orderBy('id', 'DESC')
					->get();
	}

	
	/**
	 * Get records that are visible from storage
	 *
	 * @return mixed 
	 */
	public function getLimitedPublishedRecords($limit)
	{
		return $this->model->where('is_visible', true)
					->with(['category:id,name,slug'])	
					->orderBy('id', 'DESC')
					->limit($limit)
					->get();
	}

	/**
	 * Fetch complete info about a project
	 *
	 * @param  string  $slug
	 * @return mixed 
	 */
	public function showRecord($slug)
	{
		return $this->model->where('slug', $slug)
					->where('is_visible', true)
					->with([
						'servicesProvided', 
						'projectTestimonials',
						'projectImages'
					])
					->first();
	}

	/**
	 * Save record to storage
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed 
	 */
	public function createRecord(Request $request)
	{
		if (isset($request->cover_image) && $request->hasfile('cover_image')) {
			$coverImage = $this->fileUpload->upload(
				$request->file('cover_image'), 
				$this->model->storageFolder()
			);
		}

		if (isset($request->alternative_cover_image) && $request->hasfile('alternative_cover_image')) {
			$altCoverImage = $this->fileUpload->upload(
				$request->file('alternative_cover_image'), 
				$this->model->storageFolder()
			);
		}

		DB::beginTransaction();

		$project = $this->model->create([
			'title' => $request->title,
			'caption' => $request->caption,
			'slug' => $request->title,
			'category_id' => $request->category,
			'is_visible' => $request->is_visible,
			'cover_image_name' => $coverImage['filename'] ?? NULL,
			'alt_cover_image_name' => $altCoverImage['filename'] ?? NULL,
			'client_name' => $request->client_name,
			'quote' => $request->quote,
			'quote_author' => $request->quote_author,
			'project_brief' => $request->project_brief,
			'project_video_url' => $request->project_video_url,
		]);

		DB::commit();

		return $project;

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
		$project = $this->model->find($id);

		if (isset($request->cover_image) && $request->hasfile('cover_image')) {
			$coverImage = $this->fileUpload->update(
				$request->file('cover_image'), 
				$project->cover_image_name,
				$this->model->storageFolder()
			);
		}

		if (isset($request->alternative_cover_image) && $request->hasfile('alternative_cover_image')) {
			$altCoverImage = $this->fileUpload->update(
				$request->file('alternative_cover_image'), 
				$project->alt_cover_image_name,
				$this->model->storageFolder()
			);
		}

		// dd($altCoverImage);

		DB::beginTransaction();

		$isVisible = !isset($request->is_visible) ? false : true;

		$updated = $project->update([
			'title' => $request->title,
			'caption' => $request->caption,
			'slug' => $request->title,
			'category_id' => $request->category,
			'is_visible' => $isVisible,
			'cover_image_name' => $coverImage['filename'] ?? $project->cover_image_name,
			'alt_cover_image_name' => $altCoverImage['filename'] ?? $project->alt_cover_image_name,
			'client_name' => $request->client_name,
			'quote' => $request->quote,
			'quote_author' => $request->quote_author,
			'project_brief' => $request->project_brief,
			'project_video_url' => $request->project_video_url,
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
		$project = $this->model->find($id);

		if (! is_null($project->cover_image_name)) {
			$file = $this->fileUpload->delete($project->cover_image_name, $this->model->storageFolder());	
		}

		if (! is_null($project->alt_cover_image_name)) {
			$file = $this->fileUpload->delete($project->alt_cover_image_name, $this->model->storageFolder());	
		}
		
		return $project->delete();
	}
}