<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\SliderService;
use App\Http\Services\ProjectService;
use App\Http\Services\CategoryService;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostService $postService,
        SliderService $sliderService,
        ProjectService $projectService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->sliderService = $sliderService;
        $this->projectService = $projectService;
        $this->categoryService = $categoryService;
    }

    /**
	 * Display the page and fetch some record from the database.
	 *
	 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$sliders = $this->sliderService->getVisibleRecords();
        $posts = $this->postService->getLimitedPublishedRecords(3);
        $categories = $this->categoryService->getRecords();
        $allprojects = $this->projectService->getVisibleRecords();
        $projects = $this->projectService->getLimitedPublishedRecords(8);

    	return view('welcome', compact('sliders', 'categories', 'allprojects', 'projects' ,'posts'));
    }
}
