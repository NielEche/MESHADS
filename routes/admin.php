<?php

Route::group(['middleware' => ['auth', 'user.status']], function() {
	Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
	
	Route::resource('/about/teams', 'TeamController', ['as' => 'admin']);

	Route::get('/about/company', 'AboutController@index')->name('admin.company.index');
	Route::get('/about/company/manage', 'AboutController@create')->name('admin.company.create');
	Route::post('/about/company/manage', 'AboutController@store')->name('admin.company.store');

	Route::resource('/about/clients', 'ClientController', ['as' => 'admin']);

	Route::resource('/settings/users', 'UserController', ['as' => 'admin']);

	Route::get('/settings/profile', 'ProfileController@edit')
			->name('admin.settings.profile.edit');
	Route::put('/settings/profile/change-password', 'ProfileController@changePassword')
			->name('admin.settings.profile.change-password');

	Route::get('/data/breadcrumbs', 'BreadcrumbController@index')->name('admin.breadcrumbs.index');
	Route::post('/data/breadcrumbs/create', 'BreadcrumbController@store')->name('admin.breadcrumbs.store');
	Route::put('/data/breadcrumbs/{id}', 'BreadcrumbController@update')->name('admin.breadcrumbs.update');
	Route::delete('/data/breadcrumbs/{id}', 'BreadcrumbController@destroy')->name('admin.breadcrumbs.destroy');
	
	Route::get('/data/menus', 'MenuController@index')->name('admin.menus.index');
	Route::post('/data/menus/create', 'MenuController@store')->name('admin.menus.store');
	Route::put('/data/menus/{id}', 'MenuController@update')->name('admin.menus.update');
	Route::delete('/data/menus/{id}', 'MenuController@destroy')->name('admin.menus.destroy');

	Route::resource('/data/sliders', 'SliderController', ['as' => 'admin']);

	Route::resource('/shop', 'ShopController', ['as' => 'admin']);

	Route::resource('/data/contentdata', 'ContentDataController', ['as' => 'admin']);

	Route::resource('/blog/posts', 'PostController', ['as' => 'admin']);

	Route::get('/contact', 'ContactController@create')->name('admin.contact.create');
	Route::post('/contact', 'ContactController@store')->name('admin.contact.store');

	Route::resource('/projects/categories', 'CategoryController', ['as' => 'admin']);

	Route::resource('/projects', 'ProjectController', ['as' => 'admin']);
	
	Route::get('/projects/services/{id}', 'ServicesProvidedController@index')
			->name('admin.projects.services.index');
	Route::post('/projects/services/{projectId}/create', 'ServicesProvidedController@store')
			->name('admin.projects.services.store');
	Route::put('/projects/services/{projectId}/{id}', 'ServicesProvidedController@update')
			->name('admin.projects.services.update');
	Route::delete('/projects/services/{id}', 'ServicesProvidedController@destroy')
			->name('admin.projects.services.destroy');

	Route::get('/projects/testimonials/{id}', 'ProjectTestimonialController@index')
			->name('admin.projects.testimonials.index');
	Route::post('/projects/testimonials/{projectId}/create', 'ProjectTestimonialController@store')
			->name('admin.projects.testimonials.store');
	Route::put('/projects/testimonials/{projectId}/{id}', 'ProjectTestimonialController@update')
			->name('admin.projects.testimonials.update');
	Route::delete('/projects/testimonials/{id}', 'ProjectTestimonialController@destroy')
			->name('admin.projects.testimonials.destroy');

	Route::get('/projects/images/{id}', 'ProjectImageController@index')
			->name('admin.projects.images.index');	
	Route::post('/projects/images/{projectId}/create', 'ProjectImageController@store')
			->name('admin.projects.images.store');
	Route::put('/projects/images/{projectId}/{id}', 'ProjectImageController@update')
			->name('admin.projects.images.update');
	Route::delete('/projects/images/{id}', 'ProjectImageController@destroy')
			->name('admin.projects.images.destroy');

	Route::get('/settings/basic-data', 'BasicDataController@create')
			->name('admin.settings.basic.create');
	Route::post('/settings/basic-data', 'BasicDataController@store')
			->name('admin.settings.basic.store');
});