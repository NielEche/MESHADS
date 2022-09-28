<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\Post as Model;
use App\Contracts\FileUploadContract as FileUpload;

class PostService
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
		return $this->model->where('is_published', true)
					->orderBy('id', 'DESC')
					->get();
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
					->where('is_published', true)
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
					->where('is_published', true)
					->orderBy('id', 'DESC')
					->first();
	}


	/**
	 * Get records that are visible from storage
	 *
	 * @return mixed 
	 */
	public function getLimitedPublishedRecords($limit)
	{
		return $this->model->where('is_published', true)
					->orderBy('id', 'DESC')
					->limit($limit)
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

		$saved = $this->model->create([
			'title' => $request->title,
			'caption' => $request->caption,
			'slug' => $request->title,
			'top_content' => $request->top_content,
			'middle_content' => $request->middle_content,
			'bottom_content' => $request->bottom_content,
			'video_url' => $request->video_url,
			'quote' => $request->quote,
			'quote_author' => $request->quote_author,
			'is_published' => !isset($request->is_published) ? false : true,
			'image_name' => $file ?? NULL,
		]);

		DB::commit();

		return  $saved;
	}

	/**
	 * Save record to storage
	 *
	 * @param  array  $id
	 * @return mixed 
	 */
	public function getOneRecord($id)
	{
		return $this->model->findOrFail($id);
	}

		/**
	 * View single blog story
	 *
	 * @param  array  $id
	 * @return mixed 
	 */
    public function getSlugRecord($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


	/** 
 	 * Delete record from storage
 	 *
 	 * @param  array  $id
 	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed 
	 */
	public function updateRecord($id, $request)
	{
		$post = $this->model->find($id);


		if($request->file != null){
			$file = cloudinary()->upload($request->file->getRealPath())->getSecurePath();

			$post->image_name = $file;
		}else{
			$post->save();
		}


		DB::beginTransaction();

		$updated = $this->model->find($id)->update([
			'title' => $request->title,
			'caption' => $request->caption,
			'slug' =>  $request->title,
			'top_content' => $request->top_content,
			'middle_content' => $request->middle_content,
			'bottom_content' => $request->bottom_content,
			'video_url' => $request->video_url,
			'quote' => $request->quote,
			'quote_author' => $request->quote_author,
			'is_published' => !isset($request->is_published) ? false : true,
			'image_name' => $post->image_name,
		]);

		DB::commit();

		return $updated;
	}

	/** 
 	 * Delete record from storage
 	 *
 	 * @param  array  $id
	 * @return mixed 
	 */
	public function deleteRecord($id)
	{
		$post = $this->model->find($id);

		if (!is_null($post->image_name)) {
			$file = $this->fileUpload->delete($post->image_name, $this->model->storageFolder());	
		}

		return $post->delete();
	}



	
}