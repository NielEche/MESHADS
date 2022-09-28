<?php 

namespace App\Http\Services;

use DB;
use Illuminate\Http\Request;
use App\Models\Menu as Model;

class MenuService
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
		DB::beginTransaction();

		$menu = $this->model->create([
			'title' => $request->title,
			'slug' => $request->title,
			'url' => $request->url,
			'position' => $request->position,
			'is_visible' => !isset($request->is_visible) ? false : true,
			'is_slave' => !isset($request->is_slave) ? false : true,
			'ext' => !isset($request->ext) ? false : true,
		]);

		DB::commit();

		return $menu;
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
		$menu = $this->model->find($id);

		DB::beginTransaction();		

		$updated = $menu->update([
			'title' => $request->title,
			'slug' => $request->title,
			'url' => $request->url,
			'position' => $request->position,
			'is_visible' => !isset($request->is_visible) ? false : true,
			'is_slave' => !isset($request->is_slave) ? false : true,
			'ext' => !isset($request->ext) ? false : true,
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
		return $this->model->find($id)->delete();
	}
}