<?php 

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Contact as Model;

class ContactService
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
			return $data->update([
				'header' => $request->header,
				'brief' => $request->brief,
				'address' => $request->address,
			]);

		}
		
		return $this->model->create([
			'header' => $request->header,
			'brief' => $request->brief,
			'address' => $request->address,
		]);
	}

}