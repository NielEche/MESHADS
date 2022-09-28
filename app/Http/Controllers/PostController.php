<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Http\Services\SiteService;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostService $postService,
        SiteService $siteService
    ) {

        $this->postService = $postService;
        $this->siteService = $siteService;
    }


    /**
	 * Display the about page and fetch some record from the database.
	 *
	 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$posts = $this->postService->getVisibleRecords();
    	$aboutimages = $this->siteService->getblogImage();

    	return view('blog', compact('posts', 'aboutimages' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($slug)
    {
        $post = $this->postService->getSlugRecord($slug);
        $aboutimages = $this->siteService->getblogImage();

        $next = $this->postService->getNext($post->id);
        $previous = $this->postService->getPrevious($post->id);

        return view('blogdata', compact('post', 'aboutimages', 'next', 'previous'));
    }



}
