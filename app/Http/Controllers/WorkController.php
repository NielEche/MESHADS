<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\ProjectService;
use App\Http\Services\SiteService;
use App\Http\Services\CategoryService;

class WorkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostService $postService,
        ProjectService $projectService,
        SiteService $siteService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->projectService = $projectService;
        $this->siteService = $siteService;
        $this->categoryService = $categoryService;
    }

    /**
	 * Display the "our work" page and fetch some record from the database.
	 *
	 * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getRecords();
        $projects = $this->projectService->getVisibleRecords();
        $aboutimages = $this->siteService->getWorkImage();
        $posts = $this->postService->getLimitedPublishedRecords(3);

    	return view('work', compact('posts', 'aboutimages', 'projects', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = $this->projectService->showRecord($slug) ?? abort(404);

        $next = $this->projectService->getNext($project->id);
        $previous = $this->projectService->getPrevious($project->id);

        return view('work_details', compact('project', 'next', 'previous'));
    }

}
