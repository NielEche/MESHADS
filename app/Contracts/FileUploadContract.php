<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface FileUploadContract 
{
    /** 
     * Upload file to storage
     *
     * @param  Illuminate\Http\UploadedFile $file
	 * @param  string  $folder
     * @return array
     */
	public function upload(UploadedFile $file, $folder = '');

    /**
     * Update file in storage
     *
     * @param  Illuminate\Http\UploadedFile $file
     * @param  string  $oldFileName
	 * @param  string  $folder
     * @return array
     */
    public function update(UploadedFile $file, $oldFileName, $folder = '');

    /**
     * Delete file from storage
     *
     * @param  string  $oldFileName
	 * @param  string  $folder
     * @return boolean
     */
    public function delete($oldFileName, $folder = '');

}