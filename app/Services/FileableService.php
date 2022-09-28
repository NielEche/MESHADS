<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use App\Contracts\FileUploadContract;
use Illuminate\Database\Eloquent\Model;

class FileableService implements FileUploadContract
{
	/**
	 * Returns the root path of Fileable
	 * 
	 * @param  string  $storageFolder
	 * @return string
	 */
	protected function fileableRootPath()
	{
		return config('fileables.storage.root');
	}

	/**
	 * Returns the path to the folder where the image will be stored or retrieved
	 * 
	 * @param  string  $storageFolder
	 * @return string
	 */
	protected function getPath($storageFolder = '') 
	{
		return $this->fileableRootPath() . "/$storageFolder"; 
	}

	/**
	 * Returns the real path to a file in storage
	 * 
	 * @param  string  $storageFolder
	 * @param  string  $fileName
	 * @return string
	 */
	protected function getRealPath($storageFolder, $fileName) 
	{
		return $this->fileableRootPath() . "/$storageFolder" . "/$fileName"; 
	}

    /** 
     * Upload file to storage
     *
     * @param  Illuminate\Http\UploadedFile $file
	 * @param  string  $storageFolder
     * @return array
     */
	public function upload(UploadedFile $file, $storageFolder = '')
    {
		try {
			$extension = $file->getClientOriginalExtension();
			$newFileName = uniqid(true) . '.' . $extension;

			$path = $this->getPath($storageFolder);

			$file->move($path, $newFileName);
			
			return [
				'filename' => $newFileName,
				'path' => $path,
				'realPath' => $this->getRealPath($storageFolder, $newFileName),
				'extension' => $extension,
			];
		
		} catch (\Throwable $e) {
			\Log::error($e);
		}

    }

    /**
     * Update file in storage
     *
     * @param  Illuminate\Http\UploadedFile $file
     * @param  string  $oldFileName
	 * @param  string  $storageFolder
     * @return array
     */
    public function update(UploadedFile $file, $oldFileName, $storageFolder = '')
    {
        if (!is_null($oldFileName) || $oldFileName != '') {
            $this->delete($oldFileName, $storageFolder);
        }

        return $this->upload($file, $storageFolder);
    }

    /**
     * Delete file from storage
     *
     * @param  string  $oldFileName
	 * @param  string  $storageFolder
     * @return boolean
     */
    public function delete($oldFileName, $storageFolder = '')
    {
		try {
			unlink($this->getRealPath($storageFolder, $oldFileName));

		} catch (\Throwable $e) {
			\Log::error($e);
		}
        
		return true;
    }

}