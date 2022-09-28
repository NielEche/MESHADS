<?php 

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Breadcrumb as Model;
use App\Contracts\FileUploadContract as FileUpload;

class SiteService
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
	public function getAboutImage()
	{
		return $this->model->whereIn('menu_slug', ['about'])
					->get();
	}
	/**
	 * Get record from storage
	 *
	 * @return mixed 
	 */
	public function getWorkImage()
	{
		return $this->model->whereIn('menu_slug', ['work'])
					->get();
	}
	/**
	 * Get record from storage
	 *
	 * @return mixed 
	 */
	public function getContactImage()
	{
		return $this->model->whereIn('menu_slug', ['contact'])
					->get();
	}
	/**
	 * Get record from storage
	 *
	 * @return mixed 
	 */
	public function getShopImage()
	{
		return $this->model->whereIn('menu_slug', ['shop'])
					->get();
	}
	/**
	 * Get record from storage
	 *
	 * @return mixed 
	 */
	public function getBlogImage()
	{
		return $this->model->whereIn('menu_slug', ['blog'])
					->get();
	}

}