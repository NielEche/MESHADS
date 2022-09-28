<?php 

namespace App\Http\Services;

use App\Models\Category as Model;

class CategoryService
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
	 * @return mixed 
	 */
	public function getRecords()
	{
		return $this->model->latest()->get();
	}

	/**
	 * Get visible records from storage
	 *
	 * @return mixed 
	 */
	public function getVisibleRecords()
	{
		return $this->model->where('is_enabled', true)->latest()->get();
	}

	/**
	 * Save record to storage
	 *
	 * @param  array  $data
	 * @return mixed 
	 */
	public function createRecord(array $data)
	{
		return $this->model->create([
			'name' => $data['name'],
			'slug' =>  $data['name'],
			'is_enabled' => !isset($data['is_enabled']) ? false : true,
		]);
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
 	 * Delete record from storage
 	 *
 	 * @param  array  $id
 	 * @param  array  $data
	 * @return mixed 
	 */
	public function updateRecord($id, $data)
	{
		return $this->model->find($id)->update([
			'name' => $data['name'],
			'slug' =>  $data['name'],
			'is_enabled' => !isset($data['is_enabled']) ? false : true,
		]);
	}

	/** 
 	 * Delete record from storage
 	 *
 	 * @param  array  $id
	 * @return mixed 
	 */
	public function deleteRecord($id)
	{
		return $this->model->find($id)->delete();
	}
}