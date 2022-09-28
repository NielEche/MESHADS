<?php

namespace App\Traits;

trait Fileable
{
	/*
    |--------------------------------------------------------------------------
    | Storage folder
    |--------------------------------------------------------------------------
    |
    | It returns the name of the storage folder where uploaded files relating
    | to a model will be stored. This function should return a string.
    |
    */
	abstract public function storageFolder();

	/**
     * Returns the storage root URL
     *
     * @return string
     */
	public function fileableRootUrl()
	{
		return config('fileables.storage.url');
	}

    /**
     * Returns a file from storage
     *
     * @param  string  $fileName
     * @return string
     */
    public function getFile($fileName)
    {
        return $this->fileableRootUrl() . $this->storageFolder() . "/$fileName";
    }
}
